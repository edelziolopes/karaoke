<div class="container mt-5">
    <h2 class="text-center mb-4">Escolha seu Gênero Musical</h2>
    <div id="genreContainer" class="genre-card-container">
        <?php foreach ($data['generos'] as $genero) { ?>
            <div class="genre-circle genre-card" data-id="<?= $genero['id'] ?>">
                <img src="<?= $genero['imagem'] ?>" alt="<?= $genero['nome'] ?>" class="genre-image">
                <div class="genre-overlay">
                    <a href="#" class="genre-link"><?= $genero['nome'] ?></a>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <button id="prevBtn" class="btn btn-outline-secondary" disabled>Anterior</button>
        <button id="nextBtn" class="btn btn-primary">Próximo</button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.genre-card');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const cardsPerPage = 4;
        let currentPage = 0;

        function showCards(page) {
            const start = page * cardsPerPage;
            const end = start + cardsPerPage;

            // Esconde todos os cards primeiro
            cards.forEach(card => {
                card.style.display = 'none';
            });

            // Mostra os cards da página atual
            for (let i = start; i < end && i < cards.length; i++) {
                cards[i].style.display = 'block';
            }

            // Atualiza o estado dos botões
            prevBtn.disabled = (currentPage === 0);
            nextBtn.disabled = (end >= cards.length);
        }

        nextBtn.addEventListener('click', function() {
            currentPage++;
            showCards(currentPage);
        });

        prevBtn.addEventListener('click', function() {
            currentPage--;
            showCards(currentPage);
        });

        // Mostra a primeira página ao carregar a página
        showCards(currentPage);
    });
</script>