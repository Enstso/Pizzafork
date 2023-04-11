<div class="container">
            <h1 class="text-dark mt-120">Panier</h1>
            @foreach ($pizzas as $pizza) 
                <div class="card mb-3 ">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div>
                                    @if ($pizza->picture[0] == 'i')
                                    <img src="{{ Storage::url($pizza->picture) }}"class="img-fluid rounded-3" style="width: 65px;" alt="">
                                    @else
                                    <img src="{{$pizza->picture}}" class="img-fluid rounded-3" style="width: 65px;" alt="">
                                    @endif  
                                </div>

                                <div class="ms-3">

                                    <h5>{{$pizza->text}}</h5>
                                    
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <div style="width: 80px;">
                                    <h5 class="mb-0">{{$pizza->prix}} €</h5>
                                </div>
                                <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            
            
                <a href="" class="btn btn-dark me-2">Commander</a>
            
            
                <p>Prix total {{$prixTotal .' €'}}</p>
        </div>
