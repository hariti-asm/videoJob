<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <div class="overflow-hidden">
        <main class="flex flex-col items-center justify-center h-screen px-4 space-y-4 lg:flex-row lg:justify-around lg:px-0">
            <div class="w-full lg:w-auto lg:max-w-md">
                <div class="form-container w-[350px]">
                    <h2 class="font-bold text-2xl text-[#515F08] mb-4">Welcome to Discover world!</h2>
                    <form class="space-y-4" action="/register" method="post">
                        @csrf
                        <input  class=" bg-red-500" type="text" name="name" label="Name"/>
                        <input class=" bg-red-500" type="email" name="email" label="Email"/>
                        <input class=" bg-red-500" type="password" name="password" label="Password"/>
    
                        <button type="submit">Create Account</button>
                    </form>
                </div>
            </div>
           
        </main>
    </div>
</body>
</html>