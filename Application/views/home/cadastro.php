<div class="flex flex-col items-center justify-center bg-black text-white">
    <div class="w-full max-w-lg mx-auto p-4 md:p-8">
        <div class="bg-gray-800 rounded-xl shadow-lg p-6 md:p-8">
            <h3 class="text-3xl font-bold mb-6 text-center text-yellow-400">
                <i class="fas fa-user-plus mr-2"></i> Cadastro de Usuário
            </h3>
            <form action="/usuario/cadastro" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="nome" class="block text-sm font-semibold mb-2">
                        <i class="fas fa-user mr-2"></i> Nome:
                    </label>
                    <input type="text" class="form-input w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 focus:outline-none focus:border-yellow-400" id="nome" name="txt_nome" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-semibold mb-2">
                        <i class="fas fa-envelope mr-2"></i> Email:
                    </label>
                    <input type="email" class="form-input w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 focus:outline-none focus:border-yellow-400" id="email" name="txt_email" required>
                </div>
                <div class="mb-4">
                    <label for="senha" class="block text-sm font-semibold mb-2">
                        <i class="fas fa-lock mr-2"></i> Senha:
                    </label>
                    <input type="password" class="form-input w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 focus:outline-none focus:border-yellow-400" id="senha" name="txt_senha" required>
                </div>
                <div class="mb-4">
                    <label for="turma" class="block text-sm font-semibold mb-2">
                        <i class="fas fa-graduation-cap mr-2"></i> Turma:
                    </label>
                    <select class="form-select w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 focus:outline-none focus:border-yellow-400" id="turma" name="txt_turma" required>
                        <option value="" disabled selected>Selecione a turma</option>
                        <option value="9º ano">9º ano</option>
                        <option value="1º ano (Sistemas)">1º ano (Sistemas)</option>
                        <option value="2º ano (Sistemas)">2º ano (Sistemas)</option>
                        <option value="3º ano (Sistemas)">3º ano (Sistemas)</option>
                        <option value="1º ano (Eletrônica)">1º ano (Eletrônica)</option>
                        <option value="2º ano (Eletrônica)">2º ano (Eletrônica)</option>
                        <option value="3º ano (Eletrônica)">3º ano (Eletrônica)</option>
                        <option value="1º ano (Logística)">1º ano (Logística)</option>
                        <option value="2º ano (Logística)">2º ano (Logística)</option>
                        <option value="3º ano (Logística)">3º ano (Logística)</option>
                        <option value="1º ano (Propedeutica)">1º ano (Propedeutica)</option>
                        <option value="2º ano (Propedeutica)">2º ano (Propedeutica)</option>
                        <option value="3º ano (Propedeutica)">3º ano (Propedeutica)</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="foto" class="block text-sm font-semibold mb-2">
                        <i class="fas fa-camera mr-2"></i> Foto:
                    </label>
                    <input type="file" class="form-input w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 focus:outline-none focus:border-yellow-400" id="foto" name="txt_foto" accept="image/*" required>
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:shadow-outline">
                        <i class="fas fa-save mr-2"></i> Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>