<?php
function query($pdo, $sql, $parameters = []) {
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function totalPosts($pdo){
    $query = query($pdo, 'SELECT COUNT(*) FROM post');
    $row = $query->fetch();
    return $row[0];
}

function allPosts($pdo) {
    $posts = query($pdo, 'SELECT post.id, title, content, post.image, post.date, users.user_image, fullname, category.category_name FROM post
        INNER JOIN users ON post.user_id = users.id
        INNER JOIN category ON post.category_id = category.id
        ORDER BY post.date DESC');
    return $posts->fetchAll();
}

function getPost($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM post WHERE id = :id', $parameters);
    return $query->fetch();
}

function insertPost($pdo, $title, $content, $image, $categoryid, $userid) {
    $query = 'INSERT INTO post (title, content, image, category_id, user_id, date)
        VALUES (:title, :content, :image, :categoryid, :userid, NOW())';
    $parameters = [
        ':title' => $title,
        ':content' => $content,
        ':image' => $image,
        ':categoryid' => $categoryid,
        ':userid' => $userid,
    ];
    query($pdo, $query, $parameters);
}

function updatePost($pdo, $id, $title, $content, $image, $categoryid, $userid) {
    $query = 'UPDATE post SET title = :title, content = :content, image = :image, category_id = :categoryid, user_id = :userid WHERE id = :id';
    $parameters = [
        ':title' => $title,
        ':content' => $content,
        ':image' => $image,
        ':categoryid' => $categoryid,
        ':userid' => $userid,
        ':id' => $id
    ];
    query($pdo, $query, $parameters);
}

function deletePost($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM post WHERE id = :id', $parameters);
}

function allComments($pdo) {
    $comments = query($pdo, 'SELECT comment.id, comment, post.title FROM comment
        INNER JOIN post ON comment.post_id = post.id');
    return $comments->fetchAll();
}


function insertCategory($pdo, $category_name) {
    $query = 'INSERT INTO category (category_name)
        VALUES (:category_name)';
    $parameters = [
        ':category_name' => $category_name,
    ];
    query($pdo, $query, $parameters);
}

function getCategory($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM category WHERE id = :id', $parameters);
    return $query->fetch();
}

function updateCategory($pdo, $id, $category_name) {
    $query = 'UPDATE category SET category_name = :category_name WHERE id = :id';
    $parameters = [':category_name' => $category_name, ':id' => $id];
    query($pdo, $query, $parameters);
}

function deleteCategory($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM category WHERE id = :id', $parameters);
}

function insertUser($pdo, $fullname, $username, $email, $password, $user_image) {
    $query = 'INSERT INTO users (fullname, username, email, password, user_image, role)
        VALUES (:fullname, :username, :email, :password, :user_image, :role)';
    $parameters = [
        ':fullname' => $fullname,
        ':username' => $username,
        ':email' => $email,
        ':password' => password_hash($password, PASSWORD_DEFAULT),
        ':user_image' => $user_image,
        ':role' => 'user'
    ];
    query($pdo, $query, $parameters);
}

function allUsers($pdo) {
    $users = query($pdo, 'SELECT * FROM users');
    return $users->fetchAll();
}

function getUser($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM users WHERE id = :id', $parameters);
    return $query->fetch();
}

function updateUser($pdo, $id, $fullname, $username, $email, $password, $user_image) {
    $query = 'UPDATE users SET fullname = :fullname, username = :username, email = :email, password = :password, user_image = :user_image WHERE id = :id';
    $parameters = [
        ':fullname' => $fullname,
        ':username' => $username,
        ':email' => $email,
        ':password' => password_hash($password, PASSWORD_DEFAULT),
        ':user_image' => $user_image,
        ':id' => $id
    ];
    query($pdo, $query, $parameters);
}

function deleteUser($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM users WHERE id = :id', $parameters);
}

function allCategories($pdo) {
    $categories = query($pdo, 'SELECT * FROM category');
    return $categories->fetchAll();
}

function allAdmins($pdo) {
    $admins = query($pdo, "SELECT * FROM users WHERE role = 'admin'");
    return $admins->fetchAll();
}

function insertAdmin($pdo, $id) {
    $query = 'UPDATE users SET role = :role WHERE id = :id';
    $parameters = [':role' => 'admin', ':id' => $id];
    query($pdo, $query, $parameters);
}

function getAdmin($pdo, $user_id) {
    $parameters = [':user_id' => $user_id];
    $query = query($pdo, 'SELECT * FROM users WHERE user_id = :user_id', $parameters);
    return $query->fetch();
}

function deleteAdmin($pdo, $id) {
    $query = 'UPDATE users SET role = :role WHERE id = :id';
    $parameters = [':role' => 'user', ':id' => $id];
    query($pdo, $query, $parameters);
}


function updateJoke($pdo, $jokeid, $joketext){
    $query = 'UPDATE joke SET joketext = :joketext WHERE id = :id';
    $parameters = [':joketext' => $joketext, ':id' => $jokeid];
    query($pdo, $query, $parameters);
}

function deleteJoke($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM joke WHERE id = :id', $parameters);
}

#Login
function users($pdo) {
    $users = query($pdo, 'SELECT id, fullname, username, password, role FROM users');
    return $users->fetchAll();
}

?>