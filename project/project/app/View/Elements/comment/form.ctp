<script>
  var setCommentParentId = function(parentId) {
    document.getElementById('commentParent').value = parentId;
    // scroll to form
    window.scrollTo({
      top: document.getElementById('newsCommentBoxForm').offsetTop,
      behavior: 'smooth'
    });
  };
  document.addEventListener("DOMContentLoaded", function() {
    var commentSelector = document.querySelector("#newsCommentBoxForm form");
    if (commentSelector) {
      new CommentForm(commentSelector,
        <?php echo json_encode(array(
          'object_master_id' => $masterId,
          'category_id' => $categoryId,
          'model' => MODEL_NEWSSTUDIO,
        ));
        ?>, {
          onSubmit: function() {
            var elem = document.querySelector('#newsCommentBoxForm .statusBox');
            // var elemFieldset = document.querySelector('#newsCommentBoxForm .fieldset');
            var elemBtn = document.querySelector('#newsCommentBoxForm button');
            elem.style.display = 'block';
            elem.innerHTML = 'در حال ارسال نظر...';
            // elemFieldset.setAttribute("disabled", "disabled");
          },
          onError: function() {
            var elem = document.querySelector('#newsCommentBoxForm .statusBox');
            elem.style.display = 'block';
            elem.innerHTML = 'ارسال نظر با خطا مواجه شد.';
            var elemBtn = document.querySelector('#newsCommentBoxForm button');
          },
          onSuccess: function() {
            var elem = document.querySelector('#newsCommentBoxForm .statusBox');
            var elemBtn = document.querySelector('#newsCommentBoxForm button');
            elem.style.display = 'block';
            elem.innerHTML = "نظر شما با موفقیت ارسال شد";
            var elemForm = document.querySelector('#newsCommentBoxForm form');
            elemForm.reset();
          }
        });
    }
  });
</script>
<section class="comment_section noprint" id="newsCommentBoxForm">
  <header class="section_header">
    <span class="box_header">
      دیدگاه
      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 1024 1024">
        <path fill="#040404" d="M685.248 104.704a64 64 0 0 1 0 90.496L368.448 512l316.8 316.8a64 64 0 0 1-90.496 90.496L232.704 557.248a64 64 0 0 1 0-90.496l362.048-362.048a64 64 0 0 1 90.496 0" />
      </svg>
    </span>
  </header>
  <form class="comment_form">
    <div class="first_row">
      <div class="name_cnt">
        <label for="commentName"></label>
        <input class="input" dir="rtl" id="commentName" name="name" type="text" value="" placeholder="نام">
      </div>
      <input id="commentParent" name="parent" type="hidden" value="">
      <div class="email_cnt">
        <label for="commentEmail"></label>
        <input class="input" dir="rtl" id="commentEmail" name="email" type="email" value="" placeholder="ایمیل">
      </div>
    </div>
    <div class="second_row">
      <label for="commentMessage"></label>
      <textarea class="input" rows="5" id="commentMessage" cols="60" name="message" placeholder="نظر خود را بنویسید" required></textarea>
    </div>
    <div class="comment_submit">
      <button type="submit" name="button" value="submit">
        ارسال
      </button>
    </div>
    <span class="statusBox"></span>
  </form>
</section>