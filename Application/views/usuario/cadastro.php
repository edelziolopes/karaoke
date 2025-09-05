    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title mb-4 text-center">Cadastro de Usuário</h3>
                        <form action="/usuario/salvar" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="txt_nome" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" name="txt_email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="senha" class="form-label">Senha:</label>
                                    <input type="password" class="form-control" id="senha" name="txt_senha" required>
                                </div>   <div class="mb-3">
                                <label for="turma" class="form-label">Turma:</label>
                                <select class="form-select" id="turma" name="txt_turma" required>
                                    <option value="" disabled selected>Selecione a turma</option>
                                    <option value="9º ano">9º ano</option>
                                    <option value="1º ano (Sistemas)">1º ano (Sistemas)</option>
                                    <option value="2º ano (Sistemas)">2º ano (Sistemas)</option>
                                    <option value="3º ano (Sistemas)">3º ano (Sistemas)</option>
                                    <option value="1º ano (Eletrônica)">1º ano (Eletrônica)</option>
                                    <option value="2º ano (Eletrônica)">2º ano (Eletrônica)</option>
                                    <option value="3º ano (Eletrônica)">3º ano (Eletrônica)</option>
                                    <option value="1º ano (Propedeutica)">1º ano (Propedeutica)</option>
                                    <option value="2º ano (Propedeutica)">2º ano (Propedeutica)</option>
                                    <option value="3º ano (Propedeutica)">3º ano (Propedeutica)</option>
                                </select>    </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto:</label>
                                <input type="file" class="form-control" id="foto" name="txt_foto" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
