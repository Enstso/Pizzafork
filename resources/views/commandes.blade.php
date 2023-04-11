<div class="container">
    <h1 class="text-dark mt-120">Vos Commandes</h1>
    <?php foreach ($articles as $article) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div>
                            <?php
                            echo '<img src="img/' . $article['image_article'] . '"class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">';
                            ?>
                        </div>
                        <div class="ms-3">
                            <h5><?= $article['nom_article'] ?></h5>
                            <p class="small mb-0"><?= $article['description_article'] ?></p>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <div style="width: 80px;">
                            <h5 class="mb-0"><?= $article['prix_article'] ?> €</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
