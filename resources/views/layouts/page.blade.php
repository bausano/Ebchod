<!DOCTYPE html>
<html>
    
    @include('partials.head')

    <body id="page">
        <div class="row header">
            <div class="col-12">
            
                @include('partials.menu')

                <div class="col-12 area-6">
                    @include('partials.filter')
                </div>

            </div>
        </div>
        
        @yield('main')

        @include('partials.footer')

    </body>
</html>
