<div class="overflow-hidden">
    <main class="flex flex-col items-center justify-center h-screen px-4 space-y-4 lg:flex-row lg:justify-around lg:px-0">
        <div class="w-full lg:w-auto lg:max-w-md">
            <div class="form-container w-[350px]">
                <h2 class="font-bold text-2xl text-[#515F08] mb-4">Welcome to Discover world!</h2>
                <form class="space-y-4" action="/login" method="post">
                    @csrf
                    <input type="email" name="email" label="Email"/>
                    <input type="password" name="password" label="Password"/>

                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
        <div class="hidden lg:flex lg:flex-col lg:items-center  lg:w-[50vw]">
            <h2 class="text-4xl font-bold text-center text-[#515F08] my-2">Explore the beauty of world</h2>
            <p class="text-center ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>

            <img class="shadow-xl rounded-xl mt-8" src="images/nature/img8.jpg" alt="">
        </div>
    </main>
</div>