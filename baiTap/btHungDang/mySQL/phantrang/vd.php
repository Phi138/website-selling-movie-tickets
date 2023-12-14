<?php

function pagination($total_records, $per_page_record, $link, $page, $text)
{

  $total_pages = ceil($total_records / $per_page_record);
  $pagLink = "";
  echo '<nav class="float-end mt-0" aria-label="Page navigation">';
  echo '<ul class="pagination">';
  if ($page >= 2) {
    echo "<li class='page-item'><a class='page-link' href='" . $link . "?" . $text . "=" . ($page - 1) . "'>  Trước </a></li>";
  }

  for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
      $pagLink .= "<li class='page-item'><a class='page-link active' href='" . $link . "?" . $text . "="
        . $i . "'>" . $i . " </a></li>";
    } else {
      $pagLink .= "<li class='page-item'><a class='page-link' href='" . $link . "?" . $text . "="
        . $i . "'>" . $i . " </a></li>";
    }
    if ($i > 2 and $i < $total_pages - 1) {
      $pagLink .= "<li class='page-item'>...</li>";
    }
  };
  echo $pagLink;

  if ($page < $total_pages) {
    echo "<li class='page-item'><a class='page-link' href='" . $link . "?" . $text . "=" . ($page + 1) . "'>  Sau </a></li>";
  }
  echo '</ul>';
  echo "</nav>";
}
