
        <main class="main">
            <section class="head">
                <h2 class="head__title">Гостевая книга</h2>
                <p class="head__date">Сегодня 03 Март 2020 год</p>
            </section>
            <form action="includes/add-guest.php" class="form" method="post">
                <label class="form__label">
                    <span class="form__text">Введите имя</span>
                    <input type="text" class="form__input" name="name" value="<?=$_SESSION['id']!=0?userInfo()['name']:''?>">
                </label>
                <label class="form__label">
                    <span class="form__text">Оставте отзыв</span>
                    <textarea class="form__input" name="descr"></textarea>
                </label>
                <button class="form__btn">Отправить</button>
            </form>
            <div class="comments">
                <?php
                date_default_timezone_set('Asia/Tashkent');  
                $guests = selectGuest();
                foreach($guests as $key):
                ?>
                <div class="comments__item">
                    <p class="comments__item-time"><?=$key['guest_date']?></p>
                    <section class="comments__body">
                        <div class="comments__head">
                            <h2 class="comment__head-title"><?=$key['guest_name']?></h2>
                            <img src="<?=$key['user_id']!=0?getSelectedPhoto($key['user_id'])['img_path']:'/img/1.jpg'?>" alt="" class="comments__head-img">
                        </div>
                        <p class="comments__body-descr"><?=$key['guest_text']?></p>
                        <div class="comments__footer">
                            <a href="<?=$_SESSION['id']?>" data-id='<?=$key['guest_id']?>' data-user = '<?=$key['user_id']?>'  data-date='<?=date('H:i d.m.y')?>' class="comments__footer-link edit_comment"><i class="fal fa-edit"></i></a>
                            <a href="<?=$_SESSION['id']==$key['user_id']||$key['user_id']==0?'includes/del-comment.php/?id='.$key['guest_id']:'/?route=guest&&unauthorized=true'?>"  class="comments__footer-link"><i class="fal fa-trash"></i></a>
                        </div>
                    </section>
                </div>
                <?php endforeach; ?>
            </div>
        </main>
        <script>
            const text = document.querySelectorAll('.comments__body-descr');
            const editBtn = document.querySelectorAll('.edit_comment');
            for (let i = 0; i < editBtn.length; i++) {
                editBtn[i].addEventListener('click', (e)=>{
                    e.preventDefault();
                    if (editBtn[i].dataset.user==editBtn[i].getAttribute('href')||editBtn[i].dataset.user==0) {
                      editBtn[i].classList.toggle('editing');
                      if (editBtn[i].classList.contains('editing')) {
                        text[i].setAttribute('contenteditable', '');
                        text[i].focus();
                        }
                      else{
                        let text1 = text[i].innerHTML;
                        console.log(text1);
                        editBtn[i].href = `includes/edit-comment.php/?id=${editBtn[i].dataset.id}&text=${text1}&date=${editBtn[i].dataset.date}`;
                        window.location.href  = editBtn[i].href;
                      }
                    }
                    else{
                      console.log('unauthorized user');
                    }
                }) 
              }
        </script>
        