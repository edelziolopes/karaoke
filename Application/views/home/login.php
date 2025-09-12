<div class="flex flex-col items-center justify-center bg-black text-white">
    <div class="w-full max-w-md mx-auto p-4 md:p-8">
        <div class="bg-gray-800 rounded-xl shadow-lg p-6 md:p-8">
            <h3 class="text-3xl font-bold mb-6 text-center text-yellow-400">
                <i class="fas fa-sign-in-alt mr-2"></i> Login
            </h3>

            <?php if (isset($data['erro'])): ?>
            <div class="p-4 mb-4 text-sm text-red-200 bg-red-900 rounded-lg border-l-4 border-red-500 flex items-center" role="alert">
                <i class="fas fa-exclamation-triangle mr-3"></i>
                <div>
                    <?= htmlspecialchars($data['erro']) ?>
                </div>
            </div>
            <?php endif; ?>

            <form action="/home/login" method="post">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-semibold mb-2">
                        <i class="fas fa-envelope mr-2"></i> Email:
                    </label>
                    <input type="email" class="form-input w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 focus:outline-none focus:border-yellow-400" id="email" name="txt_email" required>
                </div>
                <div class="mb-6">
                    <label for="senha" class="block text-sm font-semibold mb-2">
                        <i class="fas fa-lock mr-2"></i> Senha:
                    </label>
                    <input type="password" class="form-input w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 focus:outline-none focus:border-yellow-400" id="senha" name="txt_senha" required>
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:shadow-outline">
                        <i class="fas fa-sign-in-alt mr-2"></i> Entrar
                    </button>
                </div>
                <div class="mt-4 text-center">
                    <a href="/recuperar-senha" class="text-sm text-gray-400 hover:text-yellow-400 transition duration-300">
                        Esqueceu sua senha?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>