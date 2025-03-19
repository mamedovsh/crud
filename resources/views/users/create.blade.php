<form action="/users" method="POST">
    @csrf
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" required maxlength="50">
    
    <label for="surname">Фамилия:</label>
    <input type="text" id="surname" name="surname" required maxlength="50">
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
    
    <button type="submit">Создать пользователя</button>
</form>