<div class="container">
            <h1 class="text-dark mt-120">Panier</h1>
            @foreach ($pizzas as $pizza) 
                <div class="card mb-3 ">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div>
                                    
                                   <img src="img/' . $pizza['image_article'] . '"class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">';
                                    <img src="{{$pizza->picture}}" class="img-fluid rounded-3" style="width: 65px;" alt="">
                                </div>

                                <div class="ms-3">

                                    <h5>{{$pizza->text}}</h5>
                                    <p class="small mb-0">{{$pizza->text}}</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <div style="width: 80px;">
                                    <h5 class="mb-0">{{$pizza->prix}} €</h5>
                                </div>
                                <?php echo '<a href="deletepanier.php?id_panier=' . $article['id_panier'] . '" class="btn btn-danger"><i class="bi bi-trash"></i></a>'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            
            @if ($rows > 0) {
                echo '<a href="addCommande.php?id=' . $id . '" class="btn btn-dark me-2">Commander</a>';
            }
            

        </div>
