$(document).ready(function () {


	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = today.getFullYear();
	var today = mm + '/' + dd + '/' + yyyy;

	$('.current-recent-mail').text(today + ' -')


	// Applying Scroll Bar

	const ps = new PerfectScrollbar('.message-box-scroll');
	const mailScroll = new PerfectScrollbar('.mail-sidebar-scroll', {
		suppressScrollX: true
	});

	function mailInboxScroll() {
		$('.mailbox-inbox .collapse').each(function () {
			const mailContainerScroll = new PerfectScrollbar($(this)[0], {
				suppressScrollX: true
			});
		});
	}
	mailInboxScroll();


	/*
		fn. dynamicBadgeNotification ==> Get the badge count for mail sidebar
	*/
	function dynamicBadgeNotification(setMailCategoryCount) {
		var mailCategoryCount = setMailCategoryCount;

		// Get Parents Div(s)
		var get_ParentsDiv = $('.mail-item');
		var get_MailInboxParentsDiv = $('.mail-item.mailInbox');
		var get_UnreadMailInboxParentsDiv = $('[id*="unread-"]');
		var get_DraftParentsDiv = $('.mail-item.draft');

		// Get Parents Div(s) Counts
		var get_MailInboxElementsCount = get_MailInboxParentsDiv.length;
		var get_UnreadMailInboxElementsCount = get_UnreadMailInboxParentsDiv.length;
		var get_DraftElementsCount = get_DraftParentsDiv.length;

		// Get Badge Div(s)
		var getBadgeMailInboxDiv = $('#mailInbox .mail-badge');
		var getBadgeDraftMailDiv = $('#draft .mail-badge');

		if (mailCategoryCount === 'mailInbox') {
			if (get_UnreadMailInboxElementsCount === 0) {
				getBadgeMailInboxDiv.text('');
				return;
			}
			getBadgeMailInboxDiv.text(get_UnreadMailInboxElementsCount);
		} else if (mailCategoryCount === 'draftmail') {
			if (get_DraftElementsCount === 0) {
				getBadgeDraftMailDiv.text('');
				return;
			}
			getBadgeDraftMailDiv.text(get_DraftElementsCount);
		}
	}

	dynamicBadgeNotification('mailInbox');
	dynamicBadgeNotification('draftmail');

	// Open Modal on Compose Button Click
	$('#btn-compose-mail').on('click', function (event) {
		$('#btn-send').show();
		$('#btn-reply').hide();
		$('#btn-fwd').hide();
		$('#composeMailModal').modal('show');

		// Save And Reply Save
		$('#btn-save').show();
		$('#btn-reply-save').hide();
		$('#btn-fwd-save').hide();
	})

	/*
		Init. fn. checkAll ==> Checkbox check all
	*/


	// Search on each key pressed

	$('.input-search').on('keyup', function () {
		var rex = new RegExp($(this).val(), 'i');
		$('.message-box .mail-item').hide();
		$('.message-box .mail-item').filter(function () {
			return rex.test($(this).text());
		}).show();
	});

	// Tooltip

	$('[data-toggle="tooltip"]').tooltip({
		'template': '<div class="tooltip actions-btn-tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
	})

	// Triggered when mail is Closed

	$('.close-message').on('click', function (event) {
		event.preventDefault();
		$('.content-box .collapse').collapse('hide')
		$(this).parents('.content-box').css({
			width: '0',
			left: 'auto',
			right: '-46px'
		});
	});

	// Open Mail Sidebar on resolution below or equal to 991px.

	$('.mail-menu').on('click', function (e) {
		$(this).parents('.mail-box-container').children('.tab-title').addClass('mail-menu-show')
		$(this).parents('.mail-box-container').children('.mail-overlay').addClass('mail-overlay-show')
	})

	// Close sidebar when clicked on ovelay ( and ovelay itself ).

	$('.mail-overlay').on('click', function (e) {
		$(this).parents('.mail-box-container').children('.tab-title').removeClass('mail-menu-show')
		$(this).removeClass('mail-overlay-show')
	})

	/*
		fn. contentBoxPosition ==> Triggered when clicked on any each mail to show the mail content.
	*/
	function contentBoxPosition() {
		$('.content-box .collapse').on('show.bs.collapse', function (event) {
			var getCollpaseElementId = this.id;
			var getSelectedMailTitleElement = $('.content-box').find('.mail-title');
			var getSelectedMailContentTitle = $(this).find('.mail-content').attr('data-mailTitle');
			$(this).parent('.content-box').css({
				width: '100%',
				left: '0',
				right: '100%'
			});
			$(this).parents('#mailbox-inbox').find('.message-box [data-target="#' + getCollpaseElementId + '"]').parents('.mail-item').removeAttr('id');
			getSelectedMailTitleElement.text(getSelectedMailContentTitle);
			getSelectedMailTitleElement.attr('data-selectedMailTitle', getSelectedMailContentTitle);
			dynamicBadgeNotification('mailInbox');
		})
	}
	function stopPropagations() {
		$('.mail-item-heading .mail-item-inner .new-control, .mail-item-heading .mail-item-inner .new-control-input').on('click', function (e) {
			e.stopPropagation();
			// e.bubble();
			// console.log(e)
			console.log('sdfsf')
			if (e.isPropagationStopped) {
				console.log('yes')
				console.timeLog()
				console.log(e)

			} else {
				console.log('no')
			}
		})
	}

	/*
		====================
			Quill Editor
		====================
	*/

	/*
		=========================
			Tab Functionality
		=========================
	*/
	var $listbtns = $('.list-actions').click(function () {
		$(this).parents('.mail-box-container').find('.mailbox-inbox > .content-box').css({
			width: '0',
			left: 'auto',
			right: '-46px'
		});
		$('.content-box .collapse').collapse('hide');
		var getActionCenterDivElement = $(this).parents('.mail-box-container').find('.action-center');
		if (this.id == 'mailInbox') {
			var $el = $('.' + this.id).show();
			getActionCenterDivElement.removeClass('tab-trash-active');
			$('#ct > div').not($el).hide();
		} else if (this.id == 'personal') {
			$el = '.' + $(this).attr('id');
			$elShow = $($el).show();
			getActionCenterDivElement.removeClass('tab-trash-active');
			$('#ct > div .mail-item-heading' + $el).parents('.mail-item').show();
			$('#ct > div .mail-item-heading').not($el).parents('.mail-item').hide();
		} else if (this.id == 'work') {
			$el = '.' + $(this).attr('id');
			$elShow = $($el).show();
			getActionCenterDivElement.removeClass('tab-trash-active');
			$('#ct > div .mail-item-heading' + $el).parents('.mail-item').show();
			$('#ct > div .mail-item-heading').not($el).parents('.mail-item').hide();
		} else if (this.id == 'social') {
			$el = '.' + $(this).attr('id');
			$elShow = $($el).show();
			getActionCenterDivElement.removeClass('tab-trash-active');
			$('#ct > div .mail-item-heading' + $el).parents('.mail-item').show();
			$('#ct > div .mail-item-heading').not($el).parents('.mail-item').hide();
		} else if (this.id == 'private') {
			$el = '.' + $(this).attr('id');
			$elShow = $($el).show();
			getActionCenterDivElement.removeClass('tab-trash-active');
			$('#ct > div .mail-item-heading' + $el).parents('.mail-item').show();
			$('#ct > div .mail-item-heading').not($el).parents('.mail-item').hide();
			getActionCenterDivElement.removeClass('tab-trash-active');
		} else if (this.id == 'trashed') {
			var $el = $('.' + this.id).show();
			getActionCenterDivElement.addClass('tab-trash-active');
			$('#ct > div').not($el).hide();
		} else {
			var $el = $('.' + this.id).show();
			getActionCenterDivElement.removeClass('tab-trash-active');
			$('#ct > div').not($el).hide();
		}
		$listbtns.removeClass('active');
		$(this).addClass('active');
	})

	setTimeout(function () {
		$(".list-actions#mailInbox").trigger('click');
	}, 10);

	/*
		fn. $_GET_mailItem_Reply ==> Trigger when clicked on Reply Button inside Mail Content.
	*/
	function $_GET_mailItem_Reply() {
		$(".reply").on('click', function (event) {

			// Send And Reply
			$('#btn-reply').show();
			$('#btn-send').hide();
			$('#btn-fwd').hide();

			// Save And Reply Save
			$('#btn-reply-save').show();
			$('#btn-fwd-save').hide();
			$('#btn-save').hide();

			$('#composeMailModal').modal('show');
		})
	}

	/*
		fn. $_GET_mailItem_Forward ==> Trigger when clicked on Forward Button inside Mail Content.
	*/
	function $_GET_mailItem_Forward() {
		$(".forward").on('click', function (event) {

			$('#btn-fwd').show();
			$('#btn-reply').hide();
			$('#btn-send').hide();

			$('#btn-fwd-save').show();
			$('#btn-reply-save').hide();
			$('#btn-save').hide();

			$('#composeMailModal').modal('show');
		})
	}

	$_GET_mailItem_Reply();
	$_GET_mailItem_Forward();
	contentBoxPosition();
	stopPropagations();

	$('.tab-title .nav-pills a.nav-link').on('click', function (event) {
		$(this).parents('.mail-box-container').find('.tab-title').removeClass('mail-menu-show')
		$(this).parents('.mail-box-container').find('.mail-overlay').removeClass('mail-overlay-show')
	})

	const feedbackItems = document.querySelectorAll('.mailInbox.feedbacks');

	feedbackItems.forEach((item) => {
		item.addEventListener('click', () => {
			const username = item.querySelector('.user-email').textContent;
			const messageTitle = item.querySelector('.mail-title').textContent;
			const messageContent = item.querySelector('.mail-content-excerpt').dataset.maildescription; // Use 'dataset.maildescription'
			const innermessagetitle = item.querySelector('.mail-title').dataset.mailtitle;
			const senderEmail = item.querySelector('#senderEmail').value;

			console.log("Username:", username);
			console.log("Message Title:", messageTitle);
			console.log("Message Content:", messageContent);
			console.log("Inner Message Title:", innermessagetitle);
			console.log("Sender Email:", senderEmail);

			const mailTitle = document.getElementById('mail-title-header');
			const mailCollapse = document.getElementById('mailCollapseEleven');
			const mailContent = mailCollapse.querySelector('.mail-content');

			mailCollapse.querySelector('.mail-usr-name').textContent = username;
			mailCollapse.querySelector('.meta-mail-time .user-email').textContent = senderEmail;
			mailContent.dataset.mailTitle = innermessagetitle; // Set data-mailTitle attribute
			mailContent.dataset.mailDescription = messageContent;

			mailTitle.querySelector('.mail-title').dataset.selectedMailTitle = innermessagetitle;
			mailTitle.querySelector('.mail-title').textContent = innermessagetitle;

			mailContent.innerHTML = `<br>${JSON.parse(messageContent).ops[0].insert}<br>`;
			mailContent.innerHTML += `<br><p>${username}</p><br>`;


			console.log("mailContent.dataset.mailTitle:", mailContent.dataset.mailTitle);
			console.log("mailContent.dataset.mailDescription:", mailContent.dataset.mailDescription);
			console.log("main mail title:", mailTitle.querySelector('.mail-title').dataset.selectedMailTitle);


			mailCollapse.classList.add('show');
		});
		
	});

});