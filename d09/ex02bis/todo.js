var data = '';

$(document).ready(function()
{
	if ($.cookie("ft_list"))
		getCookie();
});

function getCookie()
{
	var cookies = $.cookie("ft_list");
	var value = cookies;
	data = value;
	var ntab = value.split(":");
	for (var val in ntab)
	{
		if (ntab[val])
			add(unescape(ntab[val]), false);
	}
	return (cookies);
}

function get_id(event)
{
	var div = $('#ft_list')[0];
	var tab = $('div');
	for (var i in tab)
	{
		if (tab[i] == event)
			return ((tab.length - 1) - i);
	}
	return (-1);
}

function deleteElem(event)
{
	var res = confirm('Vous etes sur ?');
	if (res)
	{
		var id_del = get_id(event.target);
		var ntab = data.split(":");
		data = '';
		for (var i = 0; i < ntab.length; ++i)
		{
			if (ntab[i] && i != id_del)
				data += ntab[i] + ":";
		}
		$(event.target).remove();
		$.cookie("ft_list", data, { expires : 30 });
	}
}

function add(text, create)
{
	var ft_list = $('#ft_list')[0];
	var div = $("<div></div>").text(text);
	$(div).click(deleteElem);
	if (ft_list)
		$(ft_list).prepend(div, ft_list.firstChild);
	if (create == true)
	{
		data += escape(text) + ":";
		$.cookie("ft_list", data, { expires : 30 });
	}
}

function myFunc()
{
	var val = prompt("Quel element voulez-vous ajouter ?:", "")
	if (val != '')
		add(val, true);
}