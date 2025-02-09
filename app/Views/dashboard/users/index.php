<?php
// Define o título da página
$title = 'Usuários';

// Inicia o buffer de saída
ob_start();
?>
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
<?php
// Captura o conteúdo do buffer
$content = ob_get_clean();

// Inclui o layout principal
include(__DIR__ . '/../layouts/default.php');
?>