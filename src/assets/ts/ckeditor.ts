import {
  ClassicEditor,
  Alignment,
  Autoformat,
  AutoImage,
  Autosave,
  BalloonToolbar,
  BlockQuote,
  Bold,
  Bookmark,
  CloudServices,
  Code,
  CodeBlock,
  Essentials,
  FindAndReplace,
  FontBackgroundColor,
  FontColor,
  FontFamily,
  FontSize,
  FullPage,
  GeneralHtmlSupport,
  Heading,
  Highlight,
  HorizontalLine,
  HtmlComment,
  HtmlEmbed,
  ImageBlock,
  ImageCaption,
  ImageInline,
  ImageInsert,
  ImageInsertViaUrl,
  ImageResize,
  ImageStyle,
  ImageTextAlternative,
  ImageToolbar,
  ImageUpload,
  Indent,
  IndentBlock,
  Italic,
  Link,
  LinkImage,
  List,
  ListProperties,
  Markdown,
  MediaEmbed,
  PageBreak,
  Paragraph,
  PasteFromMarkdownExperimental,
  PasteFromOffice,
  RemoveFormat,
  ShowBlocks,
  SimpleUploadAdapter,
  SourceEditing,
  SpecialCharacters,
  SpecialCharactersArrows,
  SpecialCharactersCurrency,
  SpecialCharactersEssentials,
  SpecialCharactersLatin,
  SpecialCharactersMathematical,
  SpecialCharactersText,
  Strikethrough,
  Style,
  Subscript,
  Superscript,
  Table,
  TableCaption,
  TableCellProperties,
  TableColumnResize,
  TableProperties,
  TableToolbar,
  TextTransformation,
  TodoList,
  Underline,
  WordCount
} from 'ckeditor5'

import 'ckeditor5/ckeditor5.css'

import '../css/ckeditor.css'

const LICENSE_KEY =
  'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3MzU2ODk1OTksImp0aSI6ImE3NTdhNzhkLTY2YmMtNGZmNy04Y2NkLTdjZTM4MWMwZGNmZiIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiLCJzaCJdLCJ3aGl0ZUxhYmVsIjp0cnVlLCJsaWNlbnNlVHlwZSI6InRyaWFsIiwiZmVhdHVyZXMiOlsiKiJdLCJ2YyI6ImM5ZjI3OTE3In0.NabS_-6HUFiUIR1CC3Xn0o_Ku82ibTvniIaI0jalv6osrCppe6GNm8XdH6rAIfvLi9LW8bERTrYnu1WRhPkr4A'

const editorConfig = {
  toolbar: {
    items: [
      'sourceEditing',
      'showBlocks',
      '|',
      'heading',
      'style',
      '|',
      'fontSize',
      'fontFamily',
      'fontColor',
      'fontBackgroundColor',
      '|',
      'bold',
      'italic',
      'underline',
      '|',
      'link',
      'insertImage',
      'insertTable',
      'highlight',
      'blockQuote',
      'codeBlock',
      '|',
      'alignment',
      '|',
      'bulletedList',
      'numberedList',
      'todoList',
      'outdent',
      'indent'
    ],
    shouldNotGroupWhenFull: true
  },
  plugins: [
    Alignment,
    Autoformat,
    AutoImage,
    Autosave,
    BalloonToolbar,
    BlockQuote,
    Bold,
    Bookmark,
    CloudServices,
    Code,
    CodeBlock,
    Essentials,
    FindAndReplace,
    FontBackgroundColor,
    FontColor,
    FontFamily,
    FontSize,
    FullPage,
    GeneralHtmlSupport,
    Heading,
    Highlight,
    HorizontalLine,
    HtmlComment,
    HtmlEmbed,
    ImageBlock,
    ImageCaption,
    ImageInline,
    ImageInsert,
    ImageInsertViaUrl,
    ImageResize,
    ImageStyle,
    ImageTextAlternative,
    ImageToolbar,
    ImageUpload,
    Indent,
    IndentBlock,
    Italic,
    Link,
    LinkImage,
    List,
    ListProperties,
    Markdown,
    MediaEmbed,
    PageBreak,
    Paragraph,
    PasteFromMarkdownExperimental,
    PasteFromOffice,
    RemoveFormat,
    ShowBlocks,
    SimpleUploadAdapter,
    SourceEditing,
    SpecialCharacters,
    SpecialCharactersArrows,
    SpecialCharactersCurrency,
    SpecialCharactersEssentials,
    SpecialCharactersLatin,
    SpecialCharactersMathematical,
    SpecialCharactersText,
    Strikethrough,
    Style,
    Subscript,
    Superscript,
    Table,
    TableCaption,
    TableCellProperties,
    TableColumnResize,
    TableProperties,
    TableToolbar,
    TextTransformation,
    TodoList,
    Underline,
    WordCount
  ],
  balloonToolbar: [
    'bold',
    'italic',
    '|',
    'link',
    'insertImage',
    '|',
    'bulletedList',
    'numberedList'
  ],
  fontFamily: {
    supportAllValues: true
  },
  fontSize: {
    options: [10, 12, 14, 'default', 18, 20, 22],
    supportAllValues: true
  },
  heading: {
    options: [
      {
        model: 'paragraph',
        title: 'Paragraph',
        class: 'ck-heading_paragraph'
      },
      {
        model: 'heading1',
        view: 'h1',
        title: 'Heading 1',
        class: 'ck-heading_heading1'
      },
      {
        model: 'heading2',
        view: 'h2',
        title: 'Heading 2',
        class: 'ck-heading_heading2'
      },
      {
        model: 'heading3',
        view: 'h3',
        title: 'Heading 3',
        class: 'ck-heading_heading3'
      },
      {
        model: 'heading4',
        view: 'h4',
        title: 'Heading 4',
        class: 'ck-heading_heading4'
      },
      {
        model: 'heading5',
        view: 'h5',
        title: 'Heading 5',
        class: 'ck-heading_heading5'
      },
      {
        model: 'heading6',
        view: 'h6',
        title: 'Heading 6',
        class: 'ck-heading_heading6'
      }
    ]
  },
  htmlSupport: {
    allow: [
      {
        name: /^.*$/,
        styles: true,
        attributes: true,
        classes: true
      }
    ]
  },
  image: {
    toolbar: [
      'toggleImageCaption',
      'imageTextAlternative',
      '|',
      'imageStyle:inline',
      'imageStyle:wrapText',
      'imageStyle:breakText',
      '|',
      'resizeImage'
    ]
  },
  licenseKey: LICENSE_KEY,
  link: {
    addTargetToExternalLinks: true,
    defaultProtocol: 'https://',
    decorators: {
      toggleDownloadable: {
        mode: 'manual',
        label: 'Downloadable',
        attributes: {
          download: 'file'
        }
      }
    }
  },
  list: {
    properties: {
      styles: true,
      startIndex: true,
      reversed: true
    }
  },
  menuBar: {
    isVisible: true
  },
  placeholder: 'Type or paste your content here!',
  style: {
    definitions: [
      {
        name: 'Article category',
        element: 'h3',
        classes: ['category']
      },
      {
        name: 'Title',
        element: 'h2',
        classes: ['document-title']
      },
      {
        name: 'Subtitle',
        element: 'h3',
        classes: ['document-subtitle']
      },
      {
        name: 'Info box',
        element: 'p',
        classes: ['info-box']
      },
      {
        name: 'Side quote',
        element: 'blockquote',
        classes: ['side-quote']
      },
      {
        name: 'Marker',
        element: 'span',
        classes: ['marker']
      },
      {
        name: 'Spoiler',
        element: 'span',
        classes: ['spoiler']
      },
      {
        name: 'Code (dark)',
        element: 'pre',
        classes: ['fancy-code', 'fancy-code-dark']
      },
      {
        name: 'Code (bright)',
        element: 'pre',
        classes: ['fancy-code', 'fancy-code-bright']
      }
    ]
  },
  table: {
    contentToolbar: [
      'tableColumn',
      'tableRow',
      'mergeTableCells',
      'tableProperties',
      'tableCellProperties'
    ]
  }
}

// @ts-expect-error as any
ClassicEditor.create(document.querySelector('#editor'), editorConfig).then((editor) => {
  const wordCount = editor.plugins.get('WordCount')
  document.querySelector('#editor-word-count')?.appendChild(wordCount.wordCountContainer)
  // @ts-expect-error as any
  document.querySelector('#editor-menu-bar')?.appendChild(editor.ui.view.menuBarView.element)

  return editor
})
