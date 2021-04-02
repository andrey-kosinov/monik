<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">

    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
					<x-jet-application-logo class="block h-12 w-auto" />
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
					<div class="p-6">
						<div class="text-3xl">
        					Welcome to MONIK - Simple Site Monitoring Tool!
    					</div>
					    <div class="mt-6 text-gray-500">
					    	Our monitoring tool provides easily configurable list of URLs to monitor. Our service will check your URLs every 5 minutes <br>and wait for <b>200 OK</b> HTTP Respone code.
					    	If we got any other response code than we immediatly send email to you about this error.
					    	<br><br>
					    	But if we got HTTP 200 OK Responce code our work is not done yet. We check the content of a page and look for key words defined by in URL monitor config.
					    	<br><br>
					    	Thus we can detect errors even if a site doesn't response with a correct HTTP code in case of internal problems.
					    	<br><br>
					    	MONIK is a tottaly free tool. You need just to register and create a list of URLs to monitor.
					    	<br><br>
					    	<b>Attention!</b> We require email verification while registration procedure. It is very important for checking deliverability from our service to your email provider.
					    	<br><br>
					    	Thanks and good luck!
					    </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        <a href="https://www.portalmaster.ru">PortalMaster.ru</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
