<header>
  <div></div>
  <div class="user-header">
    <div class="icon">
      <div class="moon">
        <box-icon name="moon"></box-icon>
      </div>
      <div class="bell">
        <box-icon name="bell"></box-icon>
      </div>
    </div>
    <div class="avt">
      <img src="imgs/<?= $_SESSION['customer_img'] ?>" alt="" />
      <ul class="dropdown-avt">
        <div class="avt-detail">
          <img src="imgs/<?= $_SESSION['customer_img'] ?>" alt="" />
          <div class="info">
            <h3>John Wick</h3>
            <p>Admin</p>
          </div>
        </div>
        <li>
          <box-icon name="cog"></box-icon>
          <span> Setting </span>
        </li>
        <li>
          <box-icon name="cog"></box-icon>
          <span> FAQ </span>
        </li>
        <a href="?controller=auth_admin&action=logout">
          <li>
            <box-icon name="log-out"></box-icon>
            <span>Logout</span>
          </li>
        </a>
      </ul>
    </div>
  </div>
</header>