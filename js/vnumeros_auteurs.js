$(function() {
	var $container = $('.editer_vnumeros_auteurs'),
		$redacs = $('#champ_redacteurchef'),
		$submit = '<button class="submit">Ajouter</button>',
		$select = $('#champ_vnumeros_auteurs'),
		$hidden = $('#champ_redacteurchef'),
		$liste = $('<ul class="auteurs__liste" />');
		
	$container.after($submit).before($liste);
	
	$(".submit").click(function() {
		var select_val = $select.val(),
				hidden_val = $hidden.val(),
				select_text = $('option:selected', $select).text(),
				li = '<li>';
				li += select_text;
				li += '<span class="auteurs__remove js-auteurs__remove">';
				li += '<img src="../prive/themes/spip/images/supprimer-12.png" alt="">';
				li += '</span>';
				li += '</li>';
		
		if (hidden_val.length > 0) {
			$hidden.val(hidden_val + ', ' + select_val);
		
		} else {
			$hidden.val(select_val);
		}
		
		
		$liste.append(li);
	});
});
