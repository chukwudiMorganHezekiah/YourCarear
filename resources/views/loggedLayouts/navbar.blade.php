@include('loggedLayouts.assets')

        <!--navbar -->



@include('loggedLayouts.nav')

@include('loggedLayouts.banner')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
@include('loggedLayouts.footer')
</body>
</html>
