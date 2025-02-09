<?php
// Define o título da página
$title = 'Criar Usuário';

// Inicia o buffer de saída
ob_start();
?>


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
include(__DIR__ . '/../layouts/default.php');
?>