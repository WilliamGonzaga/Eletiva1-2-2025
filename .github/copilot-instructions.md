# Copilot Instructions - Eletiva1-2-2025

## Project Overview
Este é um repositório de aulas e exercícios de PHP da Fatec, contendo material didático progressivo desde HTML/Bootstrap até projetos completos com PHP e MySQL. O código segue padrões educacionais brasileiros.

## Architecture & Structure

### Project Organization
- **Aulas (Aula1-5)**: Material didático sequencial de aulas, com exemplos progressivos
- **Exercicios**: Listas de exercícios organizadas por tema (Bootstrap, Formulários, Condicionais, Funções, Arrays)
- **Projeto**: Sistema CRUD completo de produtos/categorias com autenticação
- **ProjetoControleDeTarefas**: Sistema de controle de tarefas com projetos e membros

### Database Architecture
Ambos os projetos usam MySQL local com estruturas diferentes:

**Projeto** (database: `projetophp`):
- `usuario` - autenticação com senha hash (bcrypt)
- `categoria` - categorias de produtos
- `produto` - produtos com FK para categoria

**ProjetoControleDeTarefas** (database: `mydb`):
- `usuario`, `projeto`, `membro`, `tarefa`
- `tarefa_has_membro` - relacionamento N:N entre tarefas e membros
- Status enum: 'Pendente', 'Em Andamento', 'Concluido', 'Cancelado'

## Critical Patterns

### Database Connection (conexao.php)
```php
$dominio = "mysql:host=localhost;dbname=projetophp";
$usuario = "root";
$senha = "";
$pdo = new PDO($dominio, $usuario, $senha);
```
- **Sempre** usar PDO com prepared statements
- Conexão sem senha (ambiente local/educacional)
- Tratamento de exceções com try/catch

### Authentication Pattern
```php
// Login validation
$stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
$stmt->execute([$email]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
if($usuario && password_verify($senha, $usuario['senha'])){
    session_start();
    $_SESSION['acesso'] = true;
    $_SESSION['nome'] = $usuario['nome'];
}
```
- Usar `password_hash()` para cadastro: `password_hash($_POST['senha'], PASSWORD_BCRYPT)`
- Usar `password_verify()` para login
- Session guard: `if(!isset($_SESSION['acesso'])) header('Location: index.php');`

### Header/Footer Pattern (cabecario.php + rodape.php)
TODOS os arquivos principais seguem esta estrutura:
```php
<?php require('cabecario.php'); ?>
<!-- Conteúdo da página -->
<?php require('rodape.php'); ?>
```
- `cabecario.php`: navbar Bootstrap, session check, abertura de container
- `rodape.php`: fechamento de container, scripts Bootstrap

### Feedback Messages via URL Parameters
```php
// Redirecionamento com status
header('location: categorias.php?cadastro=true');

// Exibição
if (isset($_GET['cadastro']) && $_GET['cadastro']){
    echo "<p class='text-success'>Cadastro realizado!</p>";
}
```
Ações: `?cadastro=`, `?editar=`, `?excluir=` (valores boolean)

### CRUD List Pages Pattern
```php
$stmt = $pdo->query("SELECT * FROM categoria");
$dados = $stmt->fetchALL();

foreach($dados as $d):
?>
<tr>
    <td><?= $d['idcategoria'] ?></td>
    <td><?= $d['nome'] ?></td>
    <td class="d-flex gap-2">
        <a href="editar_categoria.php?id=<?= $d['idcategoria'] ?>" class="btn btn-sm btn-warning">Editar</a>
        <a href="consultar_categoria.php?id=<?= $d['idcategoria'] ?>" class="btn btn-sm btn-info">Consultar</a>
    </td>
</tr>
<?php endforeach; ?>
```

### Form Processing Pattern
```php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $nome = $_POST['nome'];
    $stmt = $pdo->prepare("INSERT INTO categoria (nome) VALUES (?)");
    if ($stmt->execute([$nome])){
        header('location: categorias.php?cadastro=true');
    }
}
```

## Code Conventions

### Naming Conventions
- Arquivos PHP: snake_case (`nova_categoria.php`, `editar_produto.php`)
- Nomes de tabelas: singular (`categoria`, `produto`, `usuario`)
- Chaves primárias: `id{nometabela}` (ex: `idcategoria`, `idproduto`)
- Foreign keys: `{tabela}_id{nometabela}` (ex: `categoria_idcategoria`)

### Bootstrap Usage
- Bootstrap 5.3.0 via CDN
- Classes comuns: `container`, `table table-hover table-striped`, `btn btn-{variant}`, `form-control`
- Feedback: `text-success` (verde), `text-danger` (vermelho)
- Layout: `d-flex gap-2` para botões de ação

### PHP Syntax Preferences
- Short echo: `<?= $variavel ?>` para output
- Alternative syntax para templates: `<?php foreach($dados as $d): ?> ... <?php endforeach; ?>`
- Locale BR: mensagens em português, formato de data `d/m/Y`
- Timezone: `date_default_timezone_set('America/Sao_Paulo')`

### Exercise Structure Pattern
Exercícios usam estrutura consistente:
```php
<?php include("cabecalho.php"); ?>
<h3>Enunciado do exercício</h3>
<form method="post">
    <!-- campos de entrada -->
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // lógica da solução
}
include("rodape.php");
?>
```

## Development Workflow

### Running Projects
- **Servidor local**: XAMPP ou servidor PHP built-in
- **Acesso**: `http://localhost/Eletiva1-2-2025/Projeto/` ou pasta específica
- **Database**: Importar `banco.sql` de cada projeto no MySQL

### Database Setup
```sql
-- Executar banco.sql de cada projeto
-- Projeto: CREATE SCHEMA projetophp
-- ProjetoControleDeTarefas: CREATE SCHEMA mydb
```

## Key Files Reference
- `Projeto/conexao.php` - Padrão de conexão PDO
- `Projeto/index.php` - Padrão de autenticação
- `Projeto/cabecario.php` - Template header com session guard
- `Projeto/categorias.php` - Exemplo completo de listagem CRUD
- `Projeto/nova_categoria.php` - Exemplo de formulário insert
- `Exercicios/Lista_De_Exercicios_2_Estrutura_Condicionais_Repeticoes_PHP/exercicio1.php` - Padrão de exercícios

## Important Notes
- **Segurança educacional**: Código feito para aprendizado, não produção (sem validações extensivas)
- **Português**: Toda UI, mensagens e comentários em pt-BR
- **No ORM**: Uso direto de PDO, sem frameworks ou ORMs
- **Bootstrap only**: Sem JavaScript customizado, apenas Bootstrap bundle
