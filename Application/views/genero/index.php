<div class="container my-3">
<div class="content">

<h2>Cadastro de Gêneros</h2>
<form action="/genero/salvar" method="POST">
    <div class="mb-3">
        <label for="nome" class="form-label"><i class="fas fa-theater-masks"></i> Nome</label>
        <input type="text" class="form-control" id="nome" name="txt_nome" required>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
</form>

<hr>

<h3 class="mt-5">Lista de Gêneros</h3>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col"><i class="fas fa-id-badge"></i> ID</th>
        <th scope="col"><i class="fas fa-theater-masks"></i> Nome</th>
        <th scope="col"><i class="fas fa-cog"></i> Ações</th>
      </tr> 
    </thead>
    <tbody>
      <?php foreach ($data['generos'] as $genero) { ?>
      <tr>
        <td><?= $genero['id'] ?></td>
        <td><?= $genero['nome'] ?></td>
        <td>
          <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $genero['id'] ?>" data-nome="<?= $genero['nome'] ?>"><i class="fas fa-edit"></i> Editar</button>
          <a href="/genero/excluir/<?= $genero['id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Excluir</a>
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
        <h5 class="modal-title" id="editModalLabel">Editar Gênero</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/genero/edit" method="POST">
          <input type="hidden" id="edit-id" name="id">
          <div class="mb-3">
              <label for="edit-nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="edit-nome" name="nome" required>
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
      var nome = button.getAttribute('data-nome')

      var modalIdInput = editModal.querySelector('#edit-id')
      var modalNomeInput = editModal.querySelector('#edit-nome')

      modalIdInput.value = id
      modalNomeInput.value = nome
    })
</script>
