JSafo.addThread(function()
{
	if(JSafo.$("inicio"))
	{
		JSafo.Ajax("php/modulos/inicio.php", function(response)
		{
			JSafo.$("inicio").innerHTML = response;
		});
	}
});

function inserirConteudo(modulo, response)
{
	JSafo.$(modulo).innerHTML = response;
	JSafo.reloadPlugins();
}

function carregarModulo(modulo)
{
	JSafo.Ajax("php/modulos/"+modulo+".php", function(response)
	{
		inserirConteudo(modulo, response);
	});
}

function salvar(modulo, objParams, acao)
{
	if(confirm(acao + " " + modulo + "?"))
	{
		objParams.acao = acao;
		
		JSafo.Ajax("php/modulos/"+modulo+".php", function(response)
		{
			JSafo.$(modulo).innerHTML = response;
			JSafo.reloadPlugins();
		},
		objParams);
	}
}