<!--MODALS-->
	<div style="display: none;" class="modals">
		
		<!--PHOTO MODAL-->
		<div style="display: none;" class="photo-modal">
			<p>Нажмите Esc или на эту область, чтобы закрыть окно</p>
			<img src="images/tickets/atta1.jpg" alt="atta1">
			<p>Нажмите Esc или на эту область, чтобы закрыть окно</p>
		</div>
		
		<div style="display: none;" class="create-modal">
			<p>Нажмите Esc или на эту область, чтобы закрыть окно</p>
			<div class="create-modal-wrapper">
				<div class="tickets-settigns">
					<h2 class="t-main t-bold-400 t-uppercase t-size-14">Cоздание тикета</h2>
					<input type="text" placeholder="Введите тему тикета">
					<div class="related-order">
						<span>Связанный заказ:</span>
						<select>
							<option>Вопрос не связан с заказом</option>
							<option>???</option>
							<option>???</option>
							<option>???</option>
							<option>???</option>
						</select>
					</div>
					<div class="priority">
						<span>Приоритет:</span>
						<div class="priority-wrapper">
							<div class="standart"><span>Обычный (До 8 часов)</span></div>
							<div class="non-urgent"><span>Несрочный (24 часа)</span></div>
							<div class="important">
								<span>Важный (До 6 часов)</span>
								<svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 9 9">
  									<circle cx="4.5" cy="4.5" r="4.5" fill="#fff"/>
								</svg>
							</div>
							<div class="urgent"><span>Срочный (В течении часа)</span></div>
						</div>
					</div>
				</div>
				<div class="second-section">
					<textarea class="text-area" placeholder="Введите ваше сообщение..."></textarea>
					<div class="attachments div-flex-two">
						<p style="display: none;">Нажмите на этот текст или перетащите файлы в данную область чтобы добавить их как вложение к вашему сообщению</p>
						<div>
							<div>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
							</div>
							<div class="div-flex df-col df-center">
								<span class="t-size-20 t-main">+</span>
								<span class="t-size-12">Добавить ещё</span>
							</div>
						</div>
					</div>
				</div>
				<button class="btn">Отправить</button>
			</div>
			<p>Нажмите Esc или на эту область, чтобы закрыть окно</p>
		</div>
		
	</div>
	
	<!--MAIN CONTENT-->
	<main class="main-content">
		
		<!--TICKETS BUTTONS-->
		<div class="ticket-btns container">
			<div class="div-flex-two">
				<div class="sort div-flex df-center active" onClick="OpenOpenedTickets()"><span>Открытые</span></div>
				<div class="sort div-flex df-center" onClick="OpenClosedTickets()"><span>Закрытые</span></div>
			</div>
			<button class="btn div-flex df-center">Создать тикет +</button>
		</div>
		
		<!--TICKETS WRAPPER-->
		<div class="tickets-wrapper">
			<div class="tickets-open" id="opened-tickets">
				<div class="ticket urgent">
					<img src="images/tickets/urgent.png" alt="urgent">
					<div>
						<h3 class="t-bold-400">Продление сертификата</h3>
						<p>Александр литвинов - Вам лучше обратится к программистам для поиска бекдоров в ваших скриптах и другого вредоносного кода. С нашей сторо..</p>
					</div>
					<span>05:42</span>
				</div>
				<div class="ticket standart">
					<img src="images/tickets/standart.png" alt="standart">
					<div>
						<h3 class="t-bold-400">Ошибка PHP</h3>
						<p>Алексей Сорокин - Благодарим за уточнение.</p>
					</div>
					<span>05:37</span>
				</div>
				<div class="ticket standart new">
					<img src="images/tickets/standart.png" alt="standart">
					<div>
						<h3 class="t-bold-400">А так выглядит тикет при наведении..</h3>
						<p>Марат Алимов - Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения.</p>
					</div>
					<span>05:37</span>
				</div>
				<div class="ticket non-urgent">
					<img src="images/tickets/non-urgent.png" alt="non-urgent">
					<div>
						<h3 class="t-bold-400">Планируется ДДОС атака в 17:00 МСК на наш сайт</h3>
						<p>Егор Свистун - DDoS атака завершилась. Защиту отключили.</p>
					</div>
					<span>Вчера</span>
				</div>
				<div class="ticket important">
					<img src="images/tickets/important.png" alt="important">
					<div>
						<h3 class="t-bold-400">Планируется ДДОС атака в 17:00 МСК на наш сайт</h3>
						<p>Егор Свистун - DDoS атака завершилась. Защиту отключили.</p>
					</div>
					<span>Вчера</span>
				</div>
			</div>
			<div class="tickets-close hidden" id="closed-tickets">
				<div class="ticket urgent">
					<img src="images/tickets/urgent.png" alt="urgent">
					<div>
						<h3 class="t-bold-400">Продление сертификата</h3>
						<p>Александр литвинов - Вам лучше обратится к программистам для поиска бекдоров в ваших скриптах и другого вредоносного кода. С нашей сторо..</p>
					</div>
					<span>05:42</span>
				</div>
				<div class="ticket standart">
					<img src="images/tickets/standart.png" alt="standart">
					<div>
						<h3 class="t-bold-400">А так выглядит тикет при наведении..</h3>
						<p>Марат Алимов - Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения.</p>
					</div>
					<span>05:37</span>
				</div>
				<div class="ticket standart">
					<img src="images/tickets/standart.png" alt="standart">
					<div>
						<h3 class="t-bold-400">А так выглядит тикет при наведении..</h3>
						<p>Марат Алимов - Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения.</p>
					</div>
					<span>05:37</span>
				</div>
				<div class="ticket standart">
					<img src="images/tickets/standart.png" alt="standart">
					<div>
						<h3 class="t-bold-400">А так выглядит тикет при наведении..</h3>
						<p>Марат Алимов - Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения.</p>
					</div>
					<span>05:37</span>
				</div>
				<div class="ticket standart">
					<img src="images/tickets/standart.png" alt="standart">
					<div>
						<h3 class="t-bold-400">А так выглядит тикет при наведении..</h3>
						<p>Марат Алимов - Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения.</p>
					</div>
					<span>05:37</span>
				</div>
				<div class="ticket standart">
					<img src="images/tickets/standart.png" alt="standart">
					<div>
						<h3 class="t-bold-400">А так выглядит тикет при наведении..</h3>
						<p>Марат Алимов - Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения.</p>
					</div>
					<span>05:37</span>
				</div>
				<div class="ticket standart">
					<img src="images/tickets/standart.png" alt="standart">
					<div>
						<h3 class="t-bold-400">А так выглядит тикет при наведении..</h3>
						<p>Марат Алимов - Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения.</p>
					</div>
					<span>05:37</span>
				</div>
				<div class="ticket standart">
					<img src="images/tickets/standart.png" alt="standart">
					<div>
						<h3 class="t-bold-400">А так выглядит тикет при наведении..</h3>
						<p>Марат Алимов - Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения.</p>
					</div>
					<span>05:37</span>
				</div>
				<div class="ticket standart">
					<img src="images/tickets/standart.png" alt="standart">
					<div>
						<h3 class="t-bold-400">А так выглядит тикет при наведении..</h3>
						<p>Марат Алимов - Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения.</p>
					</div>
					<span>05:37</span>
				</div>
				<div class="ticket standart">
					<img src="images/tickets/standart.png" alt="standart">
					<div>
						<h3 class="t-bold-400">Ошибка PHP</h3>
						<p>Алексей Сорокин - Благодарим за уточнение.</p>
					</div>
					<span>05:37</span>
				</div>
				<div class="ticket standart new">
					<img src="images/tickets/standart.png" alt="standart">
					<div>
						<h3 class="t-bold-400">А так выглядит тикет при наведении..</h3>
						<p>Марат Алимов - Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения. Показ наведения.</p>
					</div>
					<span>05:37</span>
				</div>
			</div>
			<div style="display: none;" class="ticket-chat">
				<div class="chat-header">
					<svg xmlns="http://www.w3.org/2000/svg" width="18.963" height="11.012" viewBox="0 0 18.963 11.012">
  						<g transform="translate(0.829 0.386)">
    						<line x2="18.135" transform="translate(0 5.037)" fill="none" stroke="#232733" stroke-width="1"/>
    						<path d="M.044,0l-6.1,5.014,6.1,5.233" transform="translate(6.001 0)" fill="none" stroke="#232733" stroke-width="1"/>
  						</g>
					</svg>
					<span><span class="t-bold-400">Тикет создан:</span> 26 апреля 2020 г. 16:21</span>
					<span><span>Заказ:</span> 34-192155 DS CUSTOM3470SYB</span>
					<span><span>Приоритет:</span> <span class="urgent">Срочный (в течение часа)</span></span>
				</div>
				<div class="chat">
					<div class="header">
						<h2>ПЛАНИРУЕТСЯ ДДОС АТАКА В 17:00 МСК НА НАШ САЙТ</h2>
						<p>Приветствую! На наш ресурс <a href="onecli.com">onecli.com</a> планируется ДДОС атака в 17:00 МСК</p>
						<p>Как нам лучше поступить?</p>
						<p>Выдержка их письма, которое пришло нам:</p>
						<hr width="300px">
					</div>
					<div class="mes">
						<img src="images/tickets/sup.jpg" alt="urgent">
						<div>
							<h3 class="t-bold-400">Оператор поддержки:</h3>
							<p>Добрый день. Скорее всего, это не будет DDoS-атака. Вам лучше обратится к программистам для поиска бекдоров в ваших скриптах и другого вредоносного</p>
						</div>
						<span class="date">05:42</span>
					</div>
					<hr width="300px">
					<div class="mes you">
						<img src="images/tickets/unnamed.png" alt="urgent">
						<div>
							<h3 class="t-bold-400">Вы:</h3>
							<p>Хорошо, буду ожидать.</p>
						</div>
						<span class="date">11:14</span>
					</div>
					<hr width="300px">
					<div class="mes">
						<img src="images/tickets/sup.jpg" alt="urgent">
						<div>
							<h3 class="t-bold-400">Оператор поддержки:</h3>
							<p>Добрый день. Скорее всего, это не будет DDoS-атака. Вам лучше обратится к программистам для поиска бекдоров в ваших скриптах и другого вредоносного кода. С нашей стороны, если будет зафиксирована DDoS-атака, мы подключим свою систему фильтрации.</p>
						</div>
						<span class="date">05:42</span>
					</div>
					<hr width="300px">
					<div class="mes you">
						<img src="images/tickets/unnamed.png" alt="urgent">
						<div>
							<h3 class="t-bold-400">Вы:</h3>
							<p>Присылаю 2 фотографии для осмотра во вложении (Как это выглядит в макете под этим)</p>
							<div class="attachments">
								<img src="images/tickets/atta1.jpg">
								<img src="images/tickets/atta2.jpg">
								<img src="images/tickets/atta2.jpg">
								<img src="images/tickets/atta1.jpg">
								<img src="images/tickets/atta2.jpg">
								<img src="images/tickets/atta1.jpg">
							</div>
						</div>
						<span class="date">11:14</span>
					</div>
					<hr width="300px">
					<div class="mes new">
						<img src="images/tickets/sup.jpg" alt="urgent">
						<div>
							<h3 class="t-bold-400">Оператор поддержки:</h3>
							<p>Добрый день. Скорее всего, это не будет DDoS-атака. Вам лучше обратится к программистам для поиска бекдоров в ваших скриптах и другого вредоносного кода. С нашей стороны, если будет зафиксирована DDoS-атака, мы подключим свою систему фильтрации.</p>
						</div>
						<span class="date">05:42</span>
					</div>
					<div class="reopen div-flex df-center">
						<span>Открыть тикет заново</span>
						<svg style="margin-left: 10px;" xmlns="http://www.w3.org/2000/svg" width="15.026" height="15.026" viewBox="0 0 15.026 15.026">
  							<path d="M0,0H15.026V15.026H0Z" fill="none"/>
  							<path d="M9.009,3.5V1L5.878,4.13l3.13,3.13v-2.5A3.757,3.757,0,1,1,5.252,8.513H4A5.009,5.009,0,1,0,9.009,3.5Z" transform="translate(-1.496 -0.374)" fill="#8b99c2"/>
						</svg>
					</div>
				</div>
				<div class="footer">
					<div class="text">
						<textarea class="text-area" placeholder="Введите ваше сообщение..."></textarea>
					</div>
					<div class="attachments div-flex-two">
						<p style="display: none;">Нажмите на этот текст или перетащите файлы в данную область чтобы добавить их как вложение к вашему сообщению</p>
						<div>
							<div>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
								<p>КартинкаВложение6.png</p>
							</div>
							<div class="div-flex df-col df-center">
								<span class="t-size-20 t-main">+</span>
								<span class="t-size-12">Добавить ещё</span>
							</div>
						</div>
					</div>
					<div class="btn-section div-flex df-center">
						<button class="btn">Отправить</button>
					</div>
				</div>
			</div>
		</div>
		
	</main>
	
	<!--SCRIPTS-->
	<script src="js/tickets.js"></script>	