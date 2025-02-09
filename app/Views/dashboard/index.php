<?php
// Define o título da página
$title = 'Dashboard';

// Inicia o buffer de saída
ob_start();
?>
            <div class="cards-container">
                <div class="card">
                    <h3><i class="fas fa-users"></i> Usuários Ativos</h3>
                    <p>1.234</p>
                    <small>+5% em relação ao mês passado</small>
                </div>

                <div class="card">
                    <h3><i class="fas fa-chart-line"></i> Receita Total</h3>
                    <p>R$ 45.670,00</p>
                    <small>+12% em relação ao mês passado</small>
                </div>

                <div class="card">
                    <h3><i class="fas fa-tasks"></i> Tarefas Pendentes</h3>
                    <p>15</p>
                    <small>3 urgentes</small>
                </div>
            </div>

            <div class="form-section">
                <h2>Adicionar Novo Item</h2>
                <form>
                    <div class="form-group">
                        <label>Nome do Item</label>
                        <input type="text" placeholder="Digite o nome...">
                    </div>

                    <div class="form-group">
                        <label>Categoria</label>
                        <select>
                            <option>Selecione uma categoria</option>
                            <option>Vendas</option>
                            <option>Suporte</option>
                            <option>Financeiro</option>
                        </select>
                    </div>

                    <button type="submit" class="btn"><i class="fas fa-plus"></i> Adicionar</button>
                </form>
            </div>


            <!-- Nova Tabela de Filmes -->
            <div class="table-section">
                <div class="section-header">
                    <h2><i class="fas fa-film"></i> Catálogo de Filmes</h2>
                    <button class="btn btn-create"><i class="fas fa-plus"></i> Novo Filme</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Capa</th>
                            <th>Título</th>
                            <th>Gênero</th>
                            <th>Ano</th>
                            <th>Classificação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="https://via.placeholder.com/60x80" class="movie-image" alt="Capa do Filme">
                            </td>
                            <td>O Poderoso Chefão</td>
                            <td>Drama/Crime</td>
                            <td>1972</td>
                            <td>18+</td>
                            <td>
                                <button class="btn btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-delete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://via.placeholder.com/60x80" class="movie-image" alt="Capa do Filme">
                            </td>
                            <td>Interestelar</td>
                            <td>Ficção Científica</td>
                            <td>2014</td>
                            <td>12+</td>
                            <td>
                                <button class="btn btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-delete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>



            <div class="table-section">
                <div class="section-header">
                    <h2><i class="fas fa-users"></i> Gerenciamento de Usuários</h2>
                    <button class="btn btn-create"><i class="fas fa-plus"></i> Novo Usuário</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Perfil</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>João Silva</td>
                            <td>joao@exemplo.com</td>
                            <td>Administrador</td>
                            <td><span class="status completed">Ativo</span></td>
                            <td>
                                <button class="btn btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-delete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Maria Souza</td>
                            <td>maria@exemplo.com</td>
                            <td>Usuário Comum</td>
                            <td><span class="status pending">Inativo</span></td>
                            <td>
                                <button class="btn btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-delete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-section">

                <h2>Últimas Transações</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>15/03/2024</td>
                            <td>Assinatura Premium</td>
                            <td>R$ 199,90</td>
                            <td><span class="status completed">Concluído</span></td>
                        </tr>
                        <tr>
                            <td>14/03/2024</td>
                            <td>Renovação Anual</td>
                            <td>R$ 1.200,00</td>
                            <td><span class="status pending">Pendente</span></td>
                        </tr>
                        <tr>
                            <td>13/03/2024</td>
                            <td>Suporte Técnico</td>
                            <td>R$ 350,00</td>
                            <td><span class="status processing">Processando</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Formulário de Edição de Filme -->
            <div class="form-section">
                <h2><i class="fas fa-edit"></i> Editar Filme</h2>
                <form class="form-columns">
                    <div>
                        <div class="form-group">
                            <label>Título do Filme</label>
                            <input type="text" value="Interestelar">
                        </div>

                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea class="form-control" rows="4">Um grupo de exploradores...</textarea>
                        </div>

                        <div class="form-group">
                            <label>Gênero</label>
                            <select>
                                <option>Ficção Científica</option>
                                <option>Ação</option>
                                <option>Drama</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="form-group">
                            <label>Data de Lançamento</label>
                            <input type="date" value="2014-10-26">
                        </div>

                        <div class="form-group">
                            <label>Classificação Indicativa</label>
                            <input type="text" value="12+">
                        </div>

                        <div class="form-group">
                            <label>Capa do Filme</label>
                            <input type="file">
                            <div class="image-preview">
                                <img src="https://via.placeholder.com/200x300" alt="Pré-visualização">
                            </div>
                        </div>
                    </div>

                    <div class="action-buttons">
                        <button type="submit" class="btn btn-edit">Salvar Alterações</button>
                        <button type="button" class="btn btn-delete">Cancelar</button>
                    </div>
                </form>
            </div>
            
<?php
// Captura o conteúdo do buffer
$content = ob_get_clean();

// Inclui o layout principal
include(__DIR__ . '/layouts/default.php');
?>