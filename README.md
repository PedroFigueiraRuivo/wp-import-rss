
# Import RSS

Plugin WordPress para importar feeds RSS. 

O plugin foi criado para resolver alguns problemas de importação presentes em outros plugins durante a importação de um rss em um projeto específico. São eles:

- Não processamento das imagens dos posts;
- Quebra dos caracteres com acentos e sinais devido ao empacotamento utf-8; e
- Liberdade de alteração dos elementos do feed DOM.

Esse plugin pode ser utilizado a partir de um shortcode que apresenta: Imagem, Título, Descrição e Link na respectiva ordem.

Um detalhe importante é que ele busca a imagem tomando como base que essa seja um elemento filho namespace do item do xml. Além disso, o plugin procura pelo namespace "**media**". Isso é: Seu RSS precia retornar dentro do item do xml a tag <media:content rul="url_do_rss_aqui"></media:content>

**(fico aberto a soluções para uma compatibilidade mais abrangente).**

## Dependências
[![7.4 php_version](https://img.shields.io/badge/php_version-^7.4-blue.svg)](https://choosealicense.com/licenses/mit/)

[![6.0 wp_version](https://img.shields.io/badge/wp_version-^6.0-skyblue.svg)](https://choosealicense.com/licenses/mit/)


# Utilização
Para poder incorporar um feed em um local de seu site, basta adicionar o shortcode `[httfox_rss_inc_feed]` no local preterido. O shortcode possui alguns parâmetros a serem configurados. São eles:

#### Obrigatórios
- `rss_url`: String: URL do RSS a ser importado.

#### Opcionais
- `posts_per_block`: String/int: Número de posts a ser apresentado (padrão: 0 = Mostra todos);
- `button_text`: String: Texto que aparece no  botão de cada post (padrão: Ver post);
- `button_target` String: valor do target dos links do post (padrão: _self = abre na mesma guia); e
- `add_class_container` String: Classe adicional para estilização específica;

## Exemplo de uso:
```
[httfox_rss_inc_feed rss_url="http://httfox.com/feed-rss/" posts_per_block="3" add_class_container="httfox-class-teste" button_text="Confira!" button_target="_blank"]
```

O exemplo acima lista 3 posts vindos do url `http://httfox.com/feed-rss/`. Adiciona a classe `httfox-class-teste` ao bloco que contém as listagens (`<ul>`), adiciona a frase "Confira!" como padrão para os botões e definne o seu comportamento para serem abertos em uma nova guia (`_blank`).

## Personalização
Não há estilos ou scripts adicionados na inclusão do feed. O objetivo desse plugim é apresentar um comportamento básico deixando a personalização livre e dinâmica.

Para personalizar e/ ou adicionar scripts, você pode utilizar as classes definidas em cada elemento renderizado como apoio, visíveis ao inspecionar o elemento através das ferramentas do desenvolvedor do navegador.