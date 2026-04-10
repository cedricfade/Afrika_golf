<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Lionel AKE">
    <title>{{ config('app.name') }} - Dashboard</title>
    {{ csrf_field() }}
    @stack('css')
</head>

<body>
    <div>
        @yield('content')
    </div>
    <!-- jquery-->
    <script src="{{ asset('assets/js/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer=""></script>
    <!--end::Page Scripts-->
    <script>
        var config_user = function() {}

        var config_language = function() {
            $('#languerecord').modal();
        }

        $('form.form-store').submit(function(e) {
            e.preventDefault();
            var $form = $(this);
            var formdata = window.FormData ? new FormData($form[0]) : null;
            var data = formdata !== null ? formdata : $form.serialize();
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            $.ajax({
                type: $(this).attr("method"),
                url: $(this).attr("action"),
                processData: false,
                contentType: false,
                data: data,
                success: function(result) {

                    console.log('!! form store church');
                    console.log(result);

                    if (result.action == true) {
                        Swal.fire({
                            position: "top-right",
                            icon: "success",
                            title: result.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function(result) {

                            init();

                        });
                    }
                }
            });
        });

        var number_validate = function(evt) {
            var theEvent = evt || window.event;
            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }

        var substringMatcher = function(strs) {
            return function findMatches(q, cb) {
                var matches, substringRegex;
                // an array that will be populated with substring matches
                matches = [];
                // regex used to determine if a string contains the substring `q`
                substrRegex = new RegExp(q, 'i');
                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, function(i, str) {
                    if (substrRegex.test(str)) {
                        matches.push(str);
                    }
                });
                cb(matches);
            };
        };

        var timestamp_to_date = function(timestamp) {
            const date = new Date(timestamp * 1000);
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Les mois sont indexés de 0 à 11
            const day = String(date.getDate()).padStart(2, '0');
            return `${day}/${month}/${year}`;
        }

        var logout = function() {
            $.ajax({
                type: 'get',
                url: "{{ route('logout') }}",
                success: function(result) {

                    console.log('!! logout()');
                    console.log(result);

                    if (result.action == true) {
                        Swal.fire({
                            position: "top-right",
                            icon: "success",
                            title: result.message,
                            showConfirmButton: false,
                            timer: 1500,
                            onOpen: function() {
                                Swal.showLoading()
                            }
                        }).then(function(result) {

                            location.reload();
                            // console.log(result.href);

                        });
                    }
                }
            });
        }
    </script>
    @stack('js')
</body>

</html>
