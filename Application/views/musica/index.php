<div class="container my-3">
<div class="content">

<h2>Cadastro de Músicas</h2>
<form action="/musica/salvar" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="id_genero" class="form-label"><i class="fas fa-theater-masks"></i> Gênero</label>
        <select class="form-control" id="id_genero" name="txt_genero" required>
            <option value="">Selecione um gênero</option>
            <?php foreach ($data['generos'] as $genero) { ?>
                <option value="<?= $genero['id'] ?>"><?= $genero['nome'] ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="nome" class="form-label"><i class="fas fa-music"></i> Nome da Música</label>
        <input type="text" class="form-control" id="nome" name="txt_nome" required>
    </div>

    <div class="mb-3">
        <label for="imagem" class="form-label"><i class="fas fa-image"></i> Imagem</label>
        <input type="text" class="form-control" id="imagem" name="txt_imagem" accept="image/*" required>
    </div>

    <div class="mb-3">
        <label for="cantor" class="form-label"><i class="fas fa-user"></i> Cantor</label>
        <input type="text" class="form-control" id="cantor" name="txt_cantor" required>
    </div>
    
    <div class="mb-3">
        <label for="youtube" class="form-label"><i class="fas fa-video"></i> Youtube</label>
        <input type="text" class="form-control" id="youtube" name="txt_youtube" required>
    </div>

    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
</form>

<hr>

<h3 class="mt-5">Lista de Músicas</h3>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th><i class="fas fa-id-badge"></i> ID</th>
        <th><i class="fas fa-theater-masks"></i> Gênero</th>
        <th><i class="fas fa-music"></i> Música</th>
        <th><i class="fas fa-image"></i> Imagem</th>
        <th><i class="fas fa-user"></i> Cantor</th>
        <th><i class="fas fa-user"></i> Youtube</th>
        <th><i class="fas fa-cog"></i> Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data['musicas'] as $musica) { ?>
      <tr>
        <td><?= $musica['id'] ?></td>
        <td><?= $musica['id_genero'] ?></td>
        <td><?= $musica['nome'] ?></td>
        <td>
            <?php if (!empty($musica['imagem'])) { ?>
                <img src="<?= $musica['imagem'] ?>" alt="<?= $musica['nome'] ?>" style="width:60px; height:60px; object-fit:cover;">
            <?php } ?>
        </td>
        <td><?= $musica['cantor'] ?></td>
        <td>
        <iframe width="300" height="200" src="https://www.youtube.com/embed/<?= $musica['youtube'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </td>
        <td>
          <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" 
                  data-id="<?= $musica['id'] ?>" 
                  data-idgenero="<?= $musica['id_genero'] ?>" 
                  data-nome="<?= $musica['nome'] ?>" 
                  data-cantor="<?= $musica['cantor'] ?>">
            <i class="fas fa-edit"></i> Editar
          </button>
          <a href="/musica/excluir/<?= $musica['id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Excluir</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Editar Música</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form action="/musica/edit" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="edit-id" name="id">
          
          <div class="mb-3">
              <label for="edit-id-genero" class="form-label">Gênero</label>
              <select class="form-control" id="edit-id-genero" name="id_genero" required>
                  <?php foreach ($data['generos'] as $genero) { ?>
                      <option value="<?= $genero['id'] ?>"><?= $genero['nome'] ?></option>
                  <?php } ?>
              </select>
          </div>

          <div class="mb-3">
              <label for="edit-nome" class="form-label">Nome da Música</label>
              <input type="text" class="form-control" id="edit-nome" name="nome" required>
          </div>

          <div class="mb-3">
              <label for="edit-imagem" class="form-label">Imagem (opcional)</label>
              <input type="file" class="form-control" id="edit-imagem" name="imagem" accept="image/*">
          </div>

          <div class="mb-3">
              <label for="edit-cantor" class="form-label">Cantor</label>
              <input type="text" class="form-control" id="edit-cantor" name="cantor" required>
          </div>
          
          <div class="mb-3">
              <label for="edit-youtube" class="form-label">Youtube</label>
              <input type="text" class="form-control" id="edit-youtube" name="youtube" required>
          </div>
          <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
      </div>
    </div>
  </div>
</div>

</div>
</div>

<script>
    var editModal = document.getElementById('editModal')
    editModal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget
      var id = button.getAttribute('data-id')
      var idGenero = button.getAttribute('data-idgenero')
      var nome = button.getAttribute('data-nome')
      var cantor = button.getAttribute('data-cantor')

      document.getElementById('edit-id').value = id
      document.getElementById('edit-id-genero').value = idGenero
      document.getElementById('edit-nome').value = nome
      document.getElementById('edit-cantor').value = cantor
    })
</script>
