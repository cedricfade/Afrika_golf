<?php

namespace Tests\Feature;

use App\Events\InvitationSubmitted;
use App\Models\WebInvitation;
use App\Notifications\CommandBallAdminAlert;
use App\Notifications\CommandBallConfirmation;
use App\Notifications\InvitationAdminAlert;
use App\Notifications\InvitationConfirmation;
use App\Notifications\InviteGroupAdminAlert;
use App\Notifications\InviteGroupConfirmation;
use App\Notifications\SponsoringAdminAlert;
use App\Notifications\SponsoringConfirmation;
use App\Notifications\WebInvitationAdminAlert;
use App\Notifications\WebInvitationConfirmation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class EmailNotificationsTest extends TestCase
{
    use RefreshDatabase;

    private string $adminEmail = 'admin@africaartgolfcup.com';

    protected function setUp(): void
    {
        parent::setUp();
        config(['services.invitation.admin_email' => $this->adminEmail]);
        config(['services.recaptcha.secret_key' => null]);
    }

    // ─── CommandBall ──────────────────────────────────────────────────────────

    public function test_command_ball_sends_confirmation_to_user(): void
    {
        Notification::fake();

        $this->postJson(route('form-command-ball'), [
            'nom'              => 'Dupont',
            'prenom'           => 'Jean',
            'email'            => 'jean.dupont@example.com',
            'telephone'        => '+33600000000',
            'nombre_de_balles' => 3,
        ])->assertOk()->assertJson(['success' => true]);

        Notification::assertSentOnDemand(
            CommandBallConfirmation::class,
            fn ($_n, $_c, $notifiable) => $notifiable->routes['mail'] === 'jean.dupont@example.com'
        );
    }

    public function test_command_ball_sends_alert_to_admin(): void
    {
        Notification::fake();

        $this->postJson(route('form-command-ball'), [
            'nom'              => 'Dupont',
            'prenom'           => 'Jean',
            'email'            => 'jean.dupont@example.com',
            'telephone'        => '+33600000001',
            'nombre_de_balles' => 3,
        ])->assertOk();

        Notification::assertSentOnDemand(
            CommandBallAdminAlert::class,
            fn ($_n, $_c, $notifiable) => $notifiable->routes['mail'] === $this->adminEmail
        );
    }

    public function test_command_ball_no_admin_alert_when_admin_email_not_configured(): void
    {
        Notification::fake();
        config(['services.invitation.admin_email' => null]);

        $this->postJson(route('form-command-ball'), [
            'nom'              => 'Dupont',
            'prenom'           => 'Jean',
            'email'            => 'jean.dupont@example.com',
            'telephone'        => '+33600000002',
            'nombre_de_balles' => 2,
        ])->assertOk();

        Notification::assertSentOnDemandTimes(CommandBallConfirmation::class, 1);
        Notification::assertSentOnDemandTimes(CommandBallAdminAlert::class, 0);
    }

    public function test_command_ball_validation_fails_without_required_fields(): void
    {
        $this->postJson(route('form-command-ball'), [])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['nom', 'prenom', 'email', 'nombre_de_balles']);
    }

    // ─── InviteGroup (Reservation) ────────────────────────────────────────────

    public function test_invite_group_sends_confirmation_to_first_participant(): void
    {
        Notification::fake();

        $this->postJson(route('form-reservation'), [
            'participants' => [[
                'type'     => 'Golfeur',
                'civilite' => 'Monsieur',
                'nom'      => 'Martin',
                'prenom'   => 'Paul',
                'email'    => 'paul.martin@example.com',
            ]],
        ])->assertOk()->assertJson(['success' => true]);

        Notification::assertSentOnDemand(
            InviteGroupConfirmation::class,
            fn ($_n, $_c, $notifiable) => $notifiable->routes['mail'] === 'paul.martin@example.com'
        );
    }

    public function test_invite_group_sends_alert_to_admin(): void
    {
        Notification::fake();

        $this->postJson(route('form-reservation'), [
            'participants' => [[
                'type'     => 'Non golfeur',
                'civilite' => 'Madame',
                'nom'      => 'Bernard',
                'prenom'   => 'Claire',
                'email'    => 'claire.bernard@example.com',
            ]],
        ])->assertOk();

        Notification::assertSentOnDemand(
            InviteGroupAdminAlert::class,
            fn ($_n, $_c, $notifiable) => $notifiable->routes['mail'] === $this->adminEmail
        );
    }

    public function test_invite_group_confirmation_contains_all_participants(): void
    {
        Notification::fake();

        $this->postJson(route('form-reservation'), [
            'participants' => [
                [
                    'type'     => 'Golfeur',
                    'civilite' => 'Monsieur',
                    'nom'      => 'Diallo',
                    'prenom'   => 'Ibrahima',
                    'email'    => 'ibrahima@example.com',
                ],
                [
                    'type'     => 'Non golfeur',
                    'civilite' => 'Madame',
                    'nom'      => 'Diallo',
                    'prenom'   => 'Fatou',
                    'email'    => 'fatou@example.com',
                ],
            ],
        ])->assertOk();

        Notification::assertSentOnDemand(
            InviteGroupConfirmation::class,
            fn ($notification, $_c, $notifiable) =>
                count($notification->invites) === 2
                && $notifiable->routes['mail'] === 'ibrahima@example.com'
        );
    }

    public function test_invite_group_validation_fails_without_participants(): void
    {
        $this->postJson(route('form-reservation'), [])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['participants']);
    }

    // ─── Invitation (direct event – WebInvitation solo) ───────────────────────

    public function test_invitation_sends_confirmation_to_user(): void
    {
        Notification::fake();

        $invitation = WebInvitation::create([
            'nomComplet' => 'Kofi Mensah',
            'email'      => 'kofi.mensah@example.com',
            'objet'      => 'Demande d\'invitation',
            'message'    => 'Je souhaite participer à l\'événement.',
            'page'       => 'rendez-vous',
        ]);

        InvitationSubmitted::dispatch($invitation);

        Notification::assertSentOnDemand(
            InvitationConfirmation::class,
            fn ($_n, $_c, $notifiable) => $notifiable->routes['mail'] === 'kofi.mensah@example.com'
        );
    }

    public function test_invitation_sends_alert_to_admin(): void
    {
        Notification::fake();

        $invitation = WebInvitation::create([
            'nomComplet' => 'Kofi Mensah',
            'email'      => 'kofi.mensah@example.com',
            'objet'      => 'Demande d\'invitation',
            'message'    => 'Je souhaite participer.',
            'page'       => 'rendez-vous',
        ]);

        InvitationSubmitted::dispatch($invitation);

        Notification::assertSentOnDemand(
            InvitationAdminAlert::class,
            fn ($_n, $_c, $notifiable) => $notifiable->routes['mail'] === $this->adminEmail
        );
    }

    // ─── Sponsoring ───────────────────────────────────────────────────────────

    public function test_sponsoring_sends_confirmation_to_user(): void
    {
        Notification::fake();

        $this->postJson(route('form-sponsoring'), [
            'companyName' => 'Acme Corp',
            'nomPrenoms'  => 'Alice Traoré',
            'country'     => 'Côte d\'Ivoire',
            'email'       => 'alice.traore@acme.com',
            'sector'      => 'Finance',
            'telePhone'   => '+2250700000000',
        ])->assertOk()->assertJson(['success' => true]);

        Notification::assertSentOnDemand(
            SponsoringConfirmation::class,
            fn ($_n, $_c, $notifiable) => $notifiable->routes['mail'] === 'alice.traore@acme.com'
        );
    }

    public function test_sponsoring_sends_alert_to_admin(): void
    {
        Notification::fake();

        $this->postJson(route('form-sponsoring'), [
            'companyName' => 'Acme Corp',
            'nomPrenoms'  => 'Alice Traoré',
            'country'     => 'Sénégal',
            'email'       => 'alice.traore@acme.com',
            'sector'      => 'Technologie',
        ])->assertOk();

        Notification::assertSentOnDemand(
            SponsoringAdminAlert::class,
            fn ($_n, $_c, $notifiable) => $notifiable->routes['mail'] === $this->adminEmail
        );
    }

    public function test_sponsoring_no_admin_alert_when_admin_email_not_configured(): void
    {
        Notification::fake();
        config(['services.invitation.admin_email' => null]);

        $this->postJson(route('form-sponsoring'), [
            'companyName' => 'Acme Corp',
            'nomPrenoms'  => 'Alice Traoré',
            'country'     => 'Ghana',
            'email'       => 'alice.traore@acme.com',
            'sector'      => 'Mining',
        ])->assertOk();

        Notification::assertSentOnDemandTimes(SponsoringConfirmation::class, 1);
        Notification::assertSentOnDemandTimes(SponsoringAdminAlert::class, 0);
    }

    public function test_sponsoring_validation_fails_without_required_fields(): void
    {
        $this->postJson(route('form-sponsoring'), [])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['companyName', 'nomPrenoms', 'country', 'email', 'sector']);
    }

    // ─── WebInvitation (Contact form) ────────────────────────────────────────

    public function test_web_invitation_sends_confirmation_to_user(): void
    {
        Notification::fake();

        $this->postJson(route('form-contact'), [
            'nomComplet' => 'Brice Ngoma',
            'email'      => 'brice.ngoma@example.com',
            'objet'      => 'Question sur le tournoi',
            'message'    => 'Bonjour, j\'aimerais avoir plus d\'informations sur les inscriptions.',
            'page'       => 'contact',
        ])->assertOk()->assertJson(['success' => true]);

        Notification::assertSentOnDemand(
            WebInvitationConfirmation::class,
            fn ($_n, $_c, $notifiable) => $notifiable->routes['mail'] === 'brice.ngoma@example.com'
        );
    }

    public function test_web_invitation_sends_alert_to_admin(): void
    {
        Notification::fake();

        $this->postJson(route('form-contact'), [
            'nomComplet' => 'Brice Ngoma',
            'email'      => 'brice.ngoma@example.com',
            'objet'      => 'Question sur le tournoi',
            'message'    => 'Bonjour, j\'aimerais avoir plus d\'informations.',
        ])->assertOk();

        Notification::assertSentOnDemand(
            WebInvitationAdminAlert::class,
            fn ($_n, $_c, $notifiable) => $notifiable->routes['mail'] === $this->adminEmail
        );
    }

    public function test_web_invitation_no_admin_alert_when_admin_email_not_configured(): void
    {
        Notification::fake();
        config(['services.invitation.admin_email' => null]);

        $this->postJson(route('form-contact'), [
            'nomComplet' => 'Brice Ngoma',
            'email'      => 'brice.ngoma@example.com',
            'objet'      => 'Test',
            'message'    => 'Message de test.',
        ])->assertOk();

        Notification::assertSentOnDemandTimes(WebInvitationConfirmation::class, 1);
        Notification::assertSentOnDemandTimes(WebInvitationAdminAlert::class, 0);
    }

    public function test_web_invitation_validation_fails_without_required_fields(): void
    {
        $this->postJson(route('form-contact'), [])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['nomComplet', 'email', 'objet', 'message']);
    }
}
