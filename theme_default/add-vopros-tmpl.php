                <div class="contentBox">

                    <div class="contentBox-addvopros">
                        <h3 class="contentBox-addvopros__title">Задать вопрос врачу онлайн</h3>
                        <p class="contentBox-addvopros__descrpage">
                            <span>Медицинские онлайн-консультации бесплатно и без регистрации</span>
                            Вы сразу получите уведомление об ответе на e-mail.
                            Также вы сможете: задавать уточняющие вопросы, поднять вопрос в ленте консультаций, удалить вопрос.
                        </p>
                        <ul class="contentBox-addvopros__about">
                            <li class="contentBox-addvopros__about-24">
                                <div class="contentBox-addvopros__box">
                                    <span>Круглосуточно</span>
                                    <p>Консультируйтесь без очередей и в удобное для вас время</p>
                                </div>
                            </li>
                            <li class="contentBox-addvopros__about-profi">
                                <div class="contentBox-addvopros__box">
                                    <span>Профессионально</span>
                                    <p>Вам ответят только поверенные врачи с образованием и стажем</p>
                                </div>
                            </li>
                            <li class="contentBox-addvopros__about-good">
                                <div class="contentBox-addvopros__box">
                                    <span>Комфортно</span>
                                    <p>Консультируйтесь не вставая с дивана с любого устройства</p>
                                </div>
                            </li>
                        </ul>

                        <div class="contentBox-addvopros-forma">
							<?php if (is_auth()): ?>
							<h4 class="contentBox-addvopros-forma__title">Заполните форму ниже</h4>
							<?=show_message()?>
                            <form method="post">
                                <!--p>
                                    <input class="contentBox-addvopros-forma__input" type="text" placeholder="ФИО" name="fio" value="<?=$_SESSION['auth']['last_name'].' '.$_SESSION['auth']['first_name']?>">
                                    
                                </p-->

                                <p>
                                    <input class="contentBox-addvopros-forma__input" type="text" placeholder="E-mail:" name="email" value="<?=(getMessageRS('email')?getMessageRS('email'):$_SESSION['auth']['user_email'])?>">
                                    <span class="vosk">Правильно укажите ваш E-Mail. На него придет ответ.</span>
									
                                </p>

                                <p>
                                    <select name="cat" class="contentBox-addvopros-forma__input">
                                        <option disabled selected>Выберите категорию вопроса</option>
                                       <?php if (is_data($catvop)): ?>
											<?php foreach($catvop as $item): ?>
											 <option value="<?=$item['id_catvop']?>"><?=$item['name']?></option>
											<?php endforeach; ?>
										<?php endif; ?>
                                    </select>
                                    <span class="vopr">Выберите категорию</span>
                                </p>

                                <div class="tema-voprosa">
                                    <strong>Изложите суть вопроса одним предложением.</strong>
                                    <input value="<?=(getMessageRS('tema')?getMessageRS('tema'):'')?>" name="tema" class="contentBox-addvopros-forma__input_tema" type="text" placeholder="Например: «Как вылечить насморк?»">
                                </div>

                                <div class="text-voprosa">
                                    <strong>Опишите суть Вашего вопроса</strong>
                                    <textarea name="text" placeholder="Старайтесь максимально подробно описать вашу проблему."><?=(getMessageRS('text')?getMessageRS('text'):'')?></textarea>
                                    <!--input type="file" name="file" multiple="" placeholder=""> <span>Добавить фото, документы, либо другие файлы</span-->
                                    <label class="contentBox-addvopros-forma__label">
                                        <input name="anon" type="checkbox" <?=(getMessageRS('anon')?'checked':false)?>>Анонимно
                                    </label>
									<button class="text-voprosa__btn">Отправить</button>
                                </div>
                            </form>
							<?php else: ?>
							<h4 class="contentBox-addvopros-forma__title">Войдите что бы продолжить:</h4>
							<div style="text-align:center;" id="uLogin1" data-ulogin="display=panel;fields=first_name,last_name,nickname,photo;providers=vkontakte,odnoklassniki,facebook,instagram;hidden=yandex,google,mailru,twitter;redirect_uri=<?=$ulogin_mat_evo_redirect?>"></div>
							<?php endif; ?>
							<?php clearMessageRS(); ?>
                        </div>

                    </div>

                </div>