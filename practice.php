<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <ul id="userList"></ul>
    <script>
      fetch('backend/js_server.php')
      .then(response => response.json())
      .then(data => {
          // Handle the fetched data
          const userList = document.getElementById('userList');
          data.forEach(user => {
              const listItem = document.createElement('li');
              listItem.textContent = `ID: ${user.firstName}, Username: ${user.lastName}, Email: ${user.email}`;
              userList.appendChild(listItem);
          });
      })
      .catch(error => console.error('Error fetching user information:', error));

    </script>
    <?php
      
    ?>
  </body>
</html>
