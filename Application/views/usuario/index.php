<div class="container my-3">
<div class="content">

<h2>Cadastro de Usuários</h2>
<form action="/usuario/salvar" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nome" class="form-label"><i class="fas fa-user"></i> Nome</label>
        <input type="text" class="form-control" id="nome" name="txt_nome" required>
    </div>

    <div class="mb-3">
        <label for="turma" class="form-label"><i class="fas fa-school"></i> Turma</label>
        <input type="text" class="form-control" id="turma" name="txt_turma" required>
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label"><i class="fas fa-image"></i> Foto</label>
        <input type="text" class="form-control" id="foto" name="txt_foto" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
</form>

<hr>

<h3 class="mt-5">Lista de Usuários</h3>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th><i class="fas fa-id-badge"></i> ID</th>
        <th><i class="fas fa-user"></i> Nome</th>
        <th><i class="fas fa-school"></i> Turma</th>
        <th><i class="fas fa-image"></i> Foto</th>
        <th><i class="fas fa-cog"></i> Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data['usuarios'] as $usuario) { ?>
      <tr>
        <td><?= $usuario['id'] ?></td>
        <td><?= $usuario['nome'] ?></td>
        <td><?= $usuario['turma'] ?></td>
        <td>
            <?php if (!empty($usuario['foto'])) { ?>
                <img src="<?= $usuario['foto'] ?>" alt="<?= $usuario['nome'] ?>" style="width:60px; height:60px; object-fit:cover;">
            <?php } ?>
        </td>
        <td>
          <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" 
                  data-id="<?= $usuario['id'] ?>" 
                  data-nome="<?= $usuario['nome'] ?>" 
                  data-turma="<?= $usuario['turma'] ?>">
            <i class="fas fa-edit"></i> Editar
          </button>
          <a href="/usuario/delete/<?= $usuario['id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Excluir</a>
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
        <h5 class="modal-title" id="editModalLabel">Editar Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form action="/usuario/edit" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="edit-id" name="id">
          
          <div class="mb-3">
              <label for="edit-nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="edit-nome" name="nome" required>
          </div>

          <div class="mb-3">
              <label for="edit-turma" class="form-label">Turma</label>
              <input type="text" class="form-control" id="edit-turma" name="turma" required>
          </div>

          <div class="mb-3">
              <label for="edit-foto" class="form-label">Foto (opcional)</label>
              <input type="file" class="form-control" id="edit-foto" name="foto" accept="image/*">
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
      var turma = button.getAttribute('data-turma')

      document.getElementById('edit-id').value = id
      document.getElementById('edit-nome').value = nome
      document.getElementById('edit-turma').value = turma
    })
</script>
