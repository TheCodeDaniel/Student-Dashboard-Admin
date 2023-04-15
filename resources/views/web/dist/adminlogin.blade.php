<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Login</title>
    <!-- output css file -->
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    <!-- fonts cdn -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
    <!-- tailwindcss cdn -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Red Hat Display', sans-serif;
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>


    <div class="">
        <div class="grid grid-cols-12 mx-auto">


            <!-- register form  -->
            <div class="w-full col-span-5 mx-auto">

                <div class="w-[70%] mx-auto">
                    <header class="p-5 w-5/12 flex mr-auto">
                        <!-- logo -->
                        <a href="index.html">
                            <img src="../images/logo.svg" alt="logo" class="w-full">
                        </a>
                    </header>


                    <!-- form div -->
                    <div class="register mt-20">
                        <h1 class="text-2xl font-semibold">Admin Login</h1>
                        <p class="text-zinc-600 text-sm mt-2">
                            Login with your valid credentials.
                        </p>

                        <form action="{{ route('admin.login') }}" method="post" class="mt-10 pb-10">
                            @csrf
                            <div class="results">
                                @if (Session::get('error'))
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    {{ Session::get('error') }}
                                </div>
                                @endif
                            </div>
                            <div class="mt-3">
                                <label for="">Email</label> <br>
                                <input value="{{ old('email') }}" name="email" type="email" placeholder="123@example.com" class="font-bold w-11/12 p-3.5 mt-2 rounded-full bg-zinc-50 border border-zinc-200"> <br>
                                <span style="color:red"> @error('email') {{ $message }} @enderror </span>
                            </div>
                            <div class="mt-3">
                                <label for="">Password</label> <br>
                                <input name="password" type="password" placeholder="***********" class="font-bold w-11/12 p-3.5 mt-2 rounded-full bg-zinc-50 border border-zinc-200"> <br>
                                <span style="color:red"> @error('password') {{ $message }} @enderror </span>
                            </div>
                            <div class="mt-8">
                                <button class="btn-admin w-11/12 text-white p-5">Login</button>
                            </div>
                        </form>

                    </div>

                    <hr class="opacity-70 mt-5">

                    <!-- footer -->
                    <footer class="py-16">
                        <p>&copy; Copywright 2023. Web Design & Development</p>
                    </footer>

                </div>

            </div>


            <!-- splash side-page -->
            <div class="bg-[#272727] w-full col-span-7 p-20 absolute sticky top-0 right-0 h-screen">

                <div class="">
                    <img src="../images/login-illustration.svg" alt="login illustration" class="w-7/12 mx-auto">
                </div>

                <div class="grid grid-cols-6 mx-auto">

                    <div class="col-start-2 col-span-4 mt-14 text-center text-white p-5">
                        <h1 class="font-bold text-2xl">Inspire a soul with a memorable experience</h1>
                        <p class="mt-3">
                            “Use StackATS for a memorable and smart smartadmission process.
                            Don’t leave your audience guessing and
                            wondering what to do, do it for them.”
                        </p>
                        <p class="mt-3"> <i>CEO, StackATS - Ito Hitoru</i> </p>
                    </div>

                </div>

            </div>

        </div>
    </div>


</body>

</html>