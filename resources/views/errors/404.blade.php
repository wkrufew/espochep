<x-app-layout>
   <div class="bg-cover  w-full h-full m-auto ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 ">
            <div class="">
                <section class="page_404">
                    <div class="container">
                        <div class="row">	
                        <div class="col-sm-12 ">
                        <div class="col-sm-10 col-sm-offset-1  text-center">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center ">404</h1>
                        </div>
                        
                        <div class="contant_box_404">
                            <h3 class="h2">
                                Oops! Ruta no encontrada
                            </h3>
                            
                            <p>
                                Por favor volver al inicio!</p>
                            
                            <a href="{{route ('home')}}" class="link_404"> {{ __('INICIO') }}</a>
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </section>
            </div>
    <style>
        
        .page_404{ padding:10px 40px; background:#fff; 
        }

        .page_404  img{ width:100%;
        object-fit: cover;
        object-position: center;}

        .four_zero_four_bg{
        
        background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
            height: 500px;
            object-fit: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        
        
        .four_zero_four_bg h1{
        font-size:80px;
        }
        
        .four_zero_four_bg h3{
                    font-size:80px;
                    }
                    
                    .link_404{			 
            color: #fff!important;
            border-radius: 8%;
            padding: 10px 20px;
            background: rgb(19, 24, 92);
            margin: 20px 0;
            display: inline-block;}

            .contant_box_404{ margin-top:-50px;
            object-position: center;
            padding: auto auto;
            margin-left: auto;
            margin-right: auto;}

    </style>

        </div>
    </div>    
</x-app-layout>
