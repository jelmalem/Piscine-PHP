var data = '';

window.onload = (function()
{
	var tab = document.cookie.split(";");
	searchElem();
});

function searchElem()
{
	var cookies = document.cookie;
	var tab = cookies.split(";");
	for (var t in tab)
	{
		if (tab[t].indexOf("ft_list") != -1)
		{
			var value = tab[t].split("=")[1];
			data = value;
			var ntab = value.split(":");
			for (var val in ntab)
			{
				if (ntab[val])
					addElem(unescape(ntab[val]), false);
			}
			break;
		}
	}
	return (cookies);
}

function getId(event)
{
	var div = document.getElementById('ft_list');
	var tab = div.getElementsByTagName('div');
	for (var i in tab)
	{
		if (tab[i] == event)
			return ((tab.length - 1) - i);
	}
	return (-1);
}

function date()
{
	var date = new Date();
	date.setTime(date.getTime() + (30*24*60*60*1000));
	var expires = "expires="+date.toUTCString();
	return (expires);
}

function delElem(event)
{
	var res = confirm('Vous etes sur ?');
	if (res)
	{
		var id_supprime = getId(event.target);
		var ntab = data.split(":");
		data = '';
		for (var i = 0; i < ntab.length; ++i)
		{
			if (ntab[i] && i != id_supprime)
				data += ntab[i] + ":";
		}
		var parent = document.getElementById('ft_list');
		parent.removeChild(event.target);
		document.cookie = "ft_list=" + data + ";" + date();
	}
}

function addElem(text, create)
{
	var parent = document.getElementById('ft_list');
	var div = document.createElement('div');
	div.textContent = text;
	div.onclick = delElem;
	if (parent)
		parent.insertBefore(div, parent.firstChild);
	if (create == true)
	{
		data += escape(text) + ":";
		document.cookie = "ft_list=" + data + ";" + expires();
	}
}

function myFunc()
{
	var val = prompt("Quel element voulez-vous ajouter ?:", "")
		if (val != null)
			addElem(val, true);
}