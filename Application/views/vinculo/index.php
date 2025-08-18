<div class="container my-3">
<div class="content">

<h2>Cadastro de Vínculos</h2>
<form action="/vinculo/create" method="POST">
    <div class="mb-3">
        <label for="id_usuario" class="form-label"><i class="fas fa-user"></i> Usuário</label>
        <select class="form-control" id="id_usuario" name="id_usuario" required>
            <option value="">Selecione um usuário</option>
            <?php foreach ($data['usuarios'] as $usuario) { ?>
                <option value="<?= $usuario['id'] ?>"><?= $usuario['nome'] ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="id_musica" class="form-label"><i class="fas fa-music"></i> Música</label>
        <select class="form-control" id="id_musica" name="id_musica" required>
            <option value="">Selecione uma música</option>
            <?php foreach ($data['musicas'] as $musica) { ?>
                <option value="<?= $musica['id'] ?>"><?= $musica['nome'] ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="nota" class="form-label"><i class="fas fa-star"></i> Nota</label>
        <input type="number" step="0.1" min="0" max="10" class="form-control" id="nota" name="nota" required>
    </div>

    <div class="mb-3">
        <label for="video" class="form-label"><i class="fas fa-video"></i> Vídeo (URL)</label>
        <input type="url" class="form-control" id="video" name="video" placeholder="https://exemplo.com/video" required>
    </div>

    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
</form>

<hr>

<h3 class="mt-5">Lista de Vínculos</h3>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th><i class="fas fa-id-badge"></i> ID</th>
        <th><i class="fas fa-user"></i> Usuário</th>
        <th><i class="fas fa-music"></i> Música</th>
        <th><i class="fas fa-star"></i> Nota</th>
        <th><i class="fas fa-video"></i> Vídeo</th>
        <th><i class="fas fa-cog"></i> Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data['vinculos'] as $vinculo) { ?>
      <tr>
        <td><?= $vinculo['id'] ?></td>
        <td><?= $vinculo['usuario_nome'] ?></td>
        <td><?= $vinculo['musica_nome'] ?></td>
        <td><?= $vinculo['nota'] ?></td>
        <td>
            <?php if (!empty($vinculo['video'])) { ?>
                <a href="<?= $vinculo['video'] ?>" target="_blank">Assistir</a>
            <?php } ?>
        </td>
        <td>
          <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" 
                  data-id="<?= $vinculo['id'] ?>" 
                  data-idusuario="<?= $vinculo['id_usuario'] ?>" 
                  data-idmusica="<?= $vinculo['id_musica'] ?>" 
                  data-nota="<?= $vinculo['nota'] ?>" 
                  data-video="<?= $vinculo['video'] ?>">
            <i class="fas fa-edit"></i> Editar
          </button>
          <a href="/vinculo/delete/<?= $vinculo['id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Excluir</a>
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
        <h5 class="modal-title" id="editModalLabel">Editar Vínculo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form action="/vinculo/edit" method="POST">
          <input type="hidden" id="edit-id" name="id">

          <div class="mb-3">
              <label for="edit-id-usuario" class="form-label">Usuário</label>
              <select class="form-control" id="edit-id-usuario" name="id_usuario" required>
                  <?php foreach ($data['usuarios'] as $usuario) { ?>
                      <option value="<?= $usuario['id'] ?>"><?= $usuario['nome'] ?></option>
                  <?php } ?>
              </select>
          </div>

          <div class="mb-3">
              <label for="edit-id-musica" class="form-label">Música</label>
              <select class="form-control" id="edit-id-musica" name="id_musica" required>
                  <?php foreach ($data['musicas'] as $musica) { ?>
                      <option value="<?= $musica['id'] ?>"><?= $musica['nome'] ?></option>
                  <?php } ?>
              </select>
          </div>

          <div class="mb-3">
              <label for="edit-nota" class="form-label">Nota</label>
              <input type="number" step="0.1" min="0" max="10" class="form-control" id="edit-nota" name="nota" required>
          </div>

          <div class="mb-3">
              <label for="edit-video" class="form-label">Vídeo (URL)</label>
              <input type="url" class="form-control" id="edit-video" name="video" required>
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
      var idUsuario = button.getAttribute('data-idusuario')
      var idMusica = button.getAttribute('data-idmusica')
      var nota = button.getAttribute('data-nota')
      var video = button.getAttribute('data-video')

      document.getElementById('edit-id').value = id
      document.getElementById('edit-id-usuario').value = idUsuario
      document.getElementById('edit-id-musica').value = idMusica
      document.getElementById('edit-nota').value = nota
      document.getElementById('edit-video').value = video
    })
</script>
