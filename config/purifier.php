<?php

 

return [

    'encoding'           => 'UTF-8',

    'finalize'           => true,

    'ignoreNonStrings'   => false,

    'cachePath'          => storage_path('app/purifier'),

    'cacheFileMode'      => 0755,

    'settings'      => [

        'default' => [

            'HTML.Doctype'             => 'HTML 4.01 Transitional',

            'HTML.Allowed' => 'rich-text-attachment[sgid|content-type|url|href|filename|filesize|height|width|previewable|presentation|caption|data-trix-attachment|data-trix-attributes],div,b,strong,i,em,u,a[href|title|data-turbo-frame],ul,ol,li,p[style],br,span[style],img[width|height|alt|src],del,h1,blockquote,figure[data-trix-attributes|data-trix-attachment],figcaption,pre,*[class]',

            'CSS.AllowedProperties'    => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align',

            'AutoFormat.AutoParagraph' => true,

            'AutoFormat.RemoveEmpty'   => true,

        ],

        'test'    => [

            'Attr.EnableID' => 'true',

        ],

        "youtube" => [

            "HTML.SafeIframe"      => 'true',

            "URI.SafeIframeRegexp" => "%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/)%",

        ],

        'custom_definition' => [

            'id'  => 'html5-definitions',

            'rev' => 1,

            'debug' => false,

            'elements' => [

                // http://developers.whatwg.org/sections.html

                ['section', 'Block', 'Flow', 'Common'],

                ['nav',     'Block', 'Flow', 'Common'],

                ['article', 'Block', 'Flow', 'Common'],

                ['aside',   'Block', 'Flow', 'Common'],

                ['header',  'Block', 'Flow', 'Common'],

                ['footer',  'Block', 'Flow', 'Common'],

 

                // Content model actually excludes several tags, not modelled here

                ['address', 'Block', 'Flow', 'Common'],

                ['hgroup', 'Block', 'Required: h1 | h2 | h3 | h4 | h5 | h6', 'Common'],

 

                // http://developers.whatwg.org/grouping-content.html

                ['figure', 'Block', 'Optional: (figcaption, Flow) | (Flow, figcaption) | Flow', 'Common'],

                ['figcaption', 'Inline', 'Flow', 'Common'],

 

                // http://developers.whatwg.org/the-video-element.html#the-video-element

                ['video', 'Block', 'Optional: (source, Flow) | (Flow, source) | Flow', 'Common', [

                    'src' => 'URI',

                    'type' => 'Text',

                    'width' => 'Length',

                    'height' => 'Length',

                    'poster' => 'URI',

                    'preload' => 'Enum#auto,metadata,none',

                    'controls' => 'Bool',

                ]],

                ['source', 'Block', 'Flow', 'Common', [

                    'src' => 'URI',

                    'type' => 'Text',

                ]],

 

                // http://developers.whatwg.org/text-level-semantics.html

                ['s',    'Inline', 'Inline', 'Common'],

                ['var',  'Inline', 'Inline', 'Common'],

                ['sub',  'Inline', 'Inline', 'Common'],

                ['sup',  'Inline', 'Inline', 'Common'],

                ['mark', 'Inline', 'Inline', 'Common'],

                ['wbr',  'Inline', 'Empty', 'Core'],

 

                // http://developers.whatwg.org/edits.html

                ['ins', 'Block', 'Flow', 'Common', ['cite' => 'URI', 'datetime' => 'CDATA']],

                ['del', 'Block', 'Flow', 'Common', ['cite' => 'URI', 'datetime' => 'CDATA']],

 

                // RichTextLaravel

                ['rich-text-attachment', 'Block', 'Flow', 'Common'],

            ],

            'attributes' => [

                ['iframe', 'allowfullscreen', 'Bool'],

                ['table', 'height', 'Text'],

                ['td', 'border', 'Text'],

                ['th', 'border', 'Text'],

                ['tr', 'width', 'Text'],

                ['tr', 'height', 'Text'],

                ['tr', 'border', 'Text'],

            ],

        ],

        'custom_attributes' => [

            ['a', 'target', 'Enum#_blank,_self,_target,_top'],

 

            // RichTextLaravel

            ['a', 'data-turbo-frame', 'Text'],

            ['img', 'class', new HTMLPurifier_AttrDef_Text()],

            ['rich-text-attachment', 'sgid', new HTMLPurifier_AttrDef_Text],

            ['rich-text-attachment', 'content-type', new HTMLPurifier_AttrDef_Text],

            ['rich-text-attachment', 'url', new HTMLPurifier_AttrDef_Text],

            ['rich-text-attachment', 'href', new HTMLPurifier_AttrDef_Text],

            ['rich-text-attachment', 'filename', new HTMLPurifier_AttrDef_Text],

            ['rich-text-attachment', 'filesize', new HTMLPurifier_AttrDef_Text],

            ['rich-text-attachment', 'height', new HTMLPurifier_AttrDef_Text],

            ['rich-text-attachment', 'width', new HTMLPurifier_AttrDef_Text],

            ['rich-text-attachment', 'previewable', new HTMLPurifier_AttrDef_Text],

            ['rich-text-attachment', 'presentation', new HTMLPurifier_AttrDef_Text],

            ['rich-text-attachment', 'caption', new HTMLPurifier_AttrDef_Text],

            ['rich-text-attachment', 'data-trix-attachment', new HTMLPurifier_AttrDef_Text],

            ['rich-text-attachment', 'data-trix-attributes', new HTMLPurifier_AttrDef_Text],

            ['figure', 'data-trix-attachment', new HTMLPurifier_AttrDef_Text],

            ['figure', 'data-trix-attributes', new HTMLPurifier_AttrDef_Text],

        ],

        'custom_elements' => [

            ['u', 'Inline', 'Inline', 'Common'],

 

            // RichTextLaravel

            ['rich-text-attachment', 'Block', 'Flow', 'Common'],

        ],

    ],

 

];