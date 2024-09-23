<?php
//Есть JSON-объект следующей структуры. Нужно собственноручно не используя никаких конвертеров
// и никакого программирования записать этот JSON-объект в виде:
//
//1.Ассоциативный массив PHP. К тому же напишите код для доступа к свойству id вот этой части:
// { "type": "comments", "id": "5" }
//
//{
//    "links": {
//    "self": "http://example.com/articles",
//    "next": "http://example.com/articles?page[offset]=2",
//    "last": "http://example.com/articles?page[offset]=10"
//  },
//  "data": [{
//    "type": "articles",
//    "id": "1",
//    "attributes": {
//        "title": "JSON:API paints my bikeshed!"
//    },
//    "relationships": {
//        "author": {
//            "links": {
//                "self": "http://example.com/articles/1/relationships/author",
//          "related": "http://example.com/articles/1/author"
//        },
//        "data": { "type": "people", "id": "9" }
//      },
//      "comments": {
//            "links": {
//                "self": "http://example.com/articles/1/relationships/comments",
//          "related": "http://example.com/articles/1/comments"
//        },
//        "data": [
//          { "type": "comments", "id": "5" },
//          { "type": "comments", "id": "12" }
//        ]
//      }
//    },
//    "links": {
//        "self": "http://example.com/articles/1"
//    }
//  }]
//}

$array = [
    "links" => [
        "self" => "http://example.com/articles",
        "next" => "http://example.com/articles?page[offset]=2",
        "last" => "http://example.com/articles?page[offset]=10"
    ],
    "data" => [
        [
            "type" => "articles",
            "id" => "1",
            "attributes" => [
                "title" => "JSON:API paints my bikeshed!"
            ],
            "relationships" => [
                "author" => [
                    "links" => [
                        "self" => "http://example.com/articles/1/relationships/author",
                        "related" => "http://example.com/articles/1/author"
                    ],
                    "data" => [
                        "type" => "people",
                        "id" => "9"
                    ]
                ],
                "comments" => [
                    "links" => [
                        "self" => "http://example.com/articles/1/relationships/comments",
                        "related" => "http://example.com/articles/1/comments"
                    ],
                    "data" => [
                        [
                            "type" => "comments",
                            "id" => "5"
                        ],
                        [
                            "type" => "comments",
                            "id" => "12"
                        ]
                    ]
                ]
            ],
            "links" => [
                "self" => "http://example.com/articles/1"
            ]
        ]
    ]
];

$comment_id = $array['data'][0]['relationships']['comments']['data'][0]['id'];
echo $comment_id;



//создать объект созданный из StdClass-ов PHP. К тому же, напишите код для доступа к свойству id вот этой части:
// { "type": "comments", "id": "5" }. Пример
//<?php
//
//$innerNode = new stdClass();
//$innerNode->link = "http://hh.ff.ff";
//$innerNode->description = "My link";
//
//$outerNode = new stdClass();
//$outerNode->innerNode = $innerNode;
//
//var_dump($outerNode);
//# Как достучаться до линка
//var_dump($outerNode->innerNode->link);



$links = new stdClass();
$links->self = "http://example.com/articles";
$links->next = "http://example.com/articles?page[offset]=2";
$links->last = "http://example.com/articles?page[offset]=10";


$attributes = new stdClass();
$attributes->title = "JSON:API paints my bikeshed!";


$authorLinks = new stdClass();
$authorLinks->self = "http://example.com/articles/1/relationships/author";
$authorLinks->related = "http://example.com/articles/1/author";


$authorData = new stdClass();
$authorData->type = "people";
$authorData->id = "9";


$author = new stdClass();
$author->links = $authorLinks;
$author->data = $authorData;


$commentsLinks = new stdClass();
$commentsLinks->self = "http://example.com/articles/1/relationships/comments";
$commentsLinks->related = "http://example.com/articles/1/comments";


$comment1 = new stdClass();
$comment1->type = "comments";
$comment1->id = "5";

$comment2 = new stdClass();
$comment2->type = "comments";
$comment2->id = "12";


$comments = new stdClass();
$comments->links = $commentsLinks;
$comments->data = [$comment1, $comment2];


$relationships = new stdClass();
$relationships->author = $author;
$relationships->comments = $comments;


$articleLinks = new stdClass();
$articleLinks->self = "http://example.com/articles/1";


$articleData = new stdClass();
$articleData->type = "articles";
$articleData->id = "1";
$articleData->attributes = $attributes;
$articleData->relationships = $relationships;
$articleData->links = $articleLinks;


$data = [$articleData];


$object = new stdClass();
$object->links = $links;
$object->data = $data;

//var_dump($object);
echo "<br>";
var_dump($object->data[0]->relationships->comments->data[0]->id);


// Создать XML
//<root>
//    <links>
//        <self>http://example.com/articles</self>
//        <next>http://example.com/articles?page[offset]=2</next>
//        <last>http://example.com/articles?page[offset]=10</last>
//    </links>
//    <data>
//        <article>
//            <type>articles</type>
//            <id>1</id>
//            <attributes>
//                <title>JSON:API paints my bikeshed!</title>
//            </attributes>
//            <relationships>
//                <author>
//                    <links>
//                        <self>http://example.com/articles/1/relationships/author</self>
//                        <related>http://example.com/articles/1/author</related>
//                    </links>
//                    <data>
//                        <type>people</type>
//                        <id>9</id>
//                    </data>
//                </author>
//                <comments>
//                    <links>
//                        <self>http://example.com/articles/1/relationships/comments</self>
//                        <related>http://example.com/articles/1/comments</related>
//                    </links>
//                    <data>
//                        <comment>
//                            <type>comments</type>
//                            <id>5</id>
//                        </comment>
//                        <comment>
//                            <type>comments</type>
//                            <id>12</id>
//                        </comment>
//                    </data>
//                </comments>
//            </relationships>
//            <links>
//                <self>http://example.com/articles/1</self>
//            </links>
//        </article>
//    </data>
//</root>


//Создать YML
//links:
//self: "http://example.com/articles"
//  next: "http://example.com/articles?page[offset]=2"
//  last: "http://example.com/articles?page[offset]=10"
//
//data:
//  - type: "articles"
//    id: "1"
//    attributes:
//      title: "JSON:API paints my bikeshed!"
//    relationships:
//      author:
//        links:
//          self: "http://example.com/articles/1/relationships/author"
//          related: "http://example.com/articles/1/author"
//        data:
//          type: "people"
//          id: "9"
//      comments:
//        links:
//          self: "http://example.com/articles/1/relationships/comments"
//          related: "http://example.com/articles/1/comments"
//        data:
//          - type: "comments"
//            id: "5"
//- type: "comments"
//            id: "12"
//    links:
//      self: "http://example.com/articles/1"
