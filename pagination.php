<nav aria-label="Page navigation">
  <h5 class="text-center mt-2"><?= $numrow." Records, ".$numpage." Pages" ?></h5>
  <ul class="pagination justify-content-center">
    <li class="page-item <?= $start_page > 0 ? "" : "disabled" ?>">
      <a class="page-link" href="<?= $start_page > 0 ? "show_product.php?page=".($start_page-1) : "#" ?>">Previous</a>
    </li>
    <?php for ($i = 0; $i < $numpage; $i++): ?>
    <li class="page-item">
      <a class="page-link" href="show_product.php?page=<?= $i ?>"><?= $i+1 ?></a>
    </li>
    <?php endfor ?>
    <li class="page-item <?= $start_page < $numpage-1 ? "" : "disabled" ?>">
      <a class="page-link" href="<?= $start_page < $numpage-1 ? "show_product.php?page=".($start_page+1) : "#" ?>">Next</a>
    </li>
  </ul>
</nav>