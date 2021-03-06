define({ "api": [
  {
    "type": "get",
    "url": "blogs",
    "title": "Blogs ( Need Headers)",
    "name": "blogs",
    "group": "Blog",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n    \"data\": [\n        {\n            \"blog_id\": 1,\n            \"title\": \"Test\",\n            \"subtitle\": \"Sub\",\n            \"description\": \"This si testing details.\",\n            \"btn_text\": \"Read More\",\n            \"additional_link\": \"#\",\n            \"image\": \"http://compower.local/uploads/blog/default.png\"\n        },\n        {\n            \"blog_id\": 2,\n            \"title\": \"Another \",\n            \"subtitle\": \"PRoject\",\n            \"description\": \"This is second blog testing. \",\n            \"btn_text\": \"Read More\",\n            \"additional_link\": \"#\",\n            \"image\": \"http://compower.local/uploads/blog/default.png\"\n        }\n    ],\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response (No Blogs Found ):",
          "content": "{\n    \"error\": {\n        \"message\": \"Unable to find Blogs!\"\n    },\n    \"status\": false,\n    \"message\": \"No Blogs Found !\",\n    \"code\": 400\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Blog",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/blogs"
      }
    ]
  },
  {
    "type": "get",
    "url": "cart",
    "title": "User Cart ( Need Headers)",
    "name": "cart",
    "group": "Cart",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n    \"data\": {\n        \"total_items\": 1,\n        \"cart_total\": 1252.5,\n        \"items\": [\n            {\n                \"cart_id\": 11,\n                \"user_id\": 3,\n                \"product_id\": 3,\n                \"qty\": 5,\n                \"title\": \"Absorbing Clamp - 12\",\n                \"model\": \"AB - 2018\",\n                \"price\": 250.5,\n                \"total\": 1252.5,\n                \"images\": [\n                    \"http://compower.local/uploads/products/45949_product.jpg\",\n                    \"http://compower.local/uploads/products/37868_product.jpg\"\n                ],\n                \"charts\": [\n                    \"http://compower.local/uploads/charts/85053_chart.jpg\"\n                ],\n                \"pdfs\": [\n                    {\n                        \"title\": \"Title - 1\",\n                        \"pdf\": \"http://compower.local/uploads/pdf/37947_pdf.jpg\"\n                    }\n                ]\n            }\n        ]\n    },\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response ( User Not Found ):",
          "content": "{\n    \"error\": {\n        \"reason\": \"User Not Found !\"\n    },\n    \"status\": false,\n    \"message\": \"User Not Found !\",\n    \"code\": 400\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Cart",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/cart"
      }
    ]
  },
  {
    "type": "post",
    "url": "cart/add",
    "title": "Add Product To Cart( Need Headers)",
    "name": "cart_add",
    "group": "Cart",
    "parameter": {
      "fields": {
        "cart": [
          {
            "group": "cart",
            "type": "integer",
            "optional": false,
            "field": "product_id",
            "description": "<p>Product ID - Required</p>"
          },
          {
            "group": "cart",
            "type": "integer",
            "optional": false,
            "field": "qty",
            "description": "<p>Product Quantity - Required</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n    \"data\": {\n        \"total_items\": 2,\n        \"cart_total\": 49176.5,\n        \"items\": [\n            {\n                \"cart_id\": 11,\n                \"user_id\": 3,\n                \"product_id\": 3,\n                \"qty\": 5,\n                \"title\": \"Absorbing Clamp - 12\",\n                \"model\": \"AB - 2018\",\n                \"price\": 250.5,\n                \"total\": 1252.5,\n                \"images\": [\n                    \"http://compower.local/uploads/products/45949_product.jpg\",\n                    \"http://compower.local/uploads/products/37868_product.jpg\"\n                ],\n                \"charts\": [\n                    \"http://compower.local/uploads/charts/85053_chart.jpg\"\n                ],\n                \"pdfs\": [\n                    {\n                        \"title\": \"Title - 1\",\n                        \"pdf\": \"http://compower.local/uploads/pdf/37947_pdf.jpg\"\n                    }\n                ]\n            },\n            {\n                \"cart_id\": 13,\n                \"user_id\": 3,\n                \"product_id\": 2,\n                \"qty\": 1,\n                \"title\": \"Product 2\",\n                \"model\": \"Modla - 2\",\n                \"price\": 47924,\n                \"total\": 47924,\n                \"images\": [\n                    \"http://compower.local/uploads/products/45949_product.jpg\",\n                    \"http://compower.local/uploads/products/37868_product.jpg\",\n                    \"http://compower.local/uploads/products/51936_product.jpg\"\n                ],\n                \"charts\": [\n                    \"http://compower.local/uploads/charts/85053_chart.jpg\",\n                    \"http://compower.local/uploads/charts/59865_chart.jpg\"\n                ],\n                \"pdfs\": [\n                    {\n                        \"title\": \"Title - 1\",\n                        \"pdf\": \"http://compower.local/uploads/pdf/37947_pdf.jpg\"\n                    },\n                    {\n                        \"title\": \"View Best Performance\",\n                        \"pdf\": \"http://compower.local/uploads/pdf/92445_pdf.jpg\"\n                    },\n                    {\n                        \"title\": \"View Best Performance - 2\",\n                        \"pdf\": \"http://compower.local/uploads/pdf/11403_pdf.jpg\"\n                    }\n                ]\n            }\n        ]\n    },\n    \"status\": true,\n    \"message\": \"Product added to Cart Successfully.\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response ( Invalid Input ):",
          "content": "{\n    \"error\": {\n        \"reason\": \"Invalid Inputs\"\n    },\n    \"status\": false,\n    \"message\": \"Something went wrong !\",\n    \"code\": 400\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Cart",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/cart/add"
      }
    ]
  },
  {
    "type": "post",
    "url": "cart/remove",
    "title": "Remove Product From Cart( Need Headers)",
    "name": "cart_remove",
    "group": "Cart",
    "parameter": {
      "fields": {
        "cart": [
          {
            "group": "cart",
            "type": "integer",
            "optional": false,
            "field": "product_id",
            "description": "<p>Product ID - Required</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n    \"data\": {\n        \"total_items\": 1,\n        \"cart_total\": 1252.5,\n        \"items\": [\n            {\n                \"cart_id\": 11,\n                \"user_id\": 3,\n                \"product_id\": 3,\n                \"qty\": 5,\n                \"title\": \"Absorbing Clamp - 12\",\n                \"model\": \"AB - 2018\",\n                \"price\": 250.5,\n                \"total\": 1252.5,\n                \"images\": [\n                    \"http://compower.local/uploads/products/45949_product.jpg\",\n                    \"http://compower.local/uploads/products/37868_product.jpg\"\n                ],\n                \"charts\": [\n                    \"http://compower.local/uploads/charts/85053_chart.jpg\"\n                ],\n                \"pdfs\": [\n                    {\n                        \"title\": \"Title - 1\",\n                        \"pdf\": \"http://compower.local/uploads/pdf/37947_pdf.jpg\"\n                    }\n                ]\n            }\n        ]\n    },\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response ( Invalid Input ):",
          "content": "{\n    \"error\": {\n        \"reason\": \"Invalid Inputs\"\n    },\n    \"status\": false,\n    \"message\": \"Something went wrong !\",\n    \"code\": 400\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Cart",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/cart/remove"
      }
    ]
  },
  {
    "type": "get",
    "url": "category",
    "title": "Category List ( Need Headers)",
    "name": "category",
    "group": "Category",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n    \"data\": [\n        {\n            \"category_id\": 1,\n            \"category_title\": \"Antenna - Updated\",\n            \"products\": [\n                {\n                    \"product_id\": 1,\n                    \"title\": \"Test Proudct\",\n                    \"model\": \"Modal - 001\",\n                    \"qty\": 250,\n                    \"price\": 1000,\n                    \"description\": \"This is Lorem Ipusm test things.\",\n                    \"features\": \"Special Features\",\n                    \"specifications\": \"Specal Specification\",\n                    \"images\": [\n                        \"http://compower.local/uploads/products/31797_product.jpg\",\n                        \"http://compower.local/uploads/products/85576_product.jpg\",\n                        \"http://compower.local/uploads/products/68294_product.jpg\"\n                    ],\n                    \"charts\": [\n                        \"http://compower.local/uploads/charts/85709_chart.jpg\",\n                        \"http://compower.local/uploads/charts/70282_chart.jpg\"\n                    ],\n                    \"pdfs\": [\n                        {\n                            \"title\": \"PDF 1\",\n                            \"pdf\": \"http://compower.local/uploads/pdf/13709_pdf.jpg\"\n                        },\n                        {\n                            \"title\": \"PDF TItle 2\",\n                            \"pdf\": \"http://compower.local/uploads/pdf/41750_pdf.jpg\"\n                        }\n                    ]\n                }\n            ]\n        },\n        {\n            \"category_id\": 2,\n            \"category_title\": \"Absorbing Clamps\",\n            \"products\": [\n                {\n                    \"product_id\": 3,\n                    \"title\": \"Absorbing Clamp - 12\",\n                    \"model\": \"AB - 2018\",\n                    \"qty\": 2500,\n                    \"price\": 250.5,\n                    \"description\": \"this is description\\r\\n\\r\\nMultiline Test\\r\\n\\r\\nTHird Line\",\n                    \"features\": \"Frequency - 100 MHZ\\r\\n\\r\\nHuman Readable\\r\\n\\r\\nBits / Byte - Calculated\",\n                    \"specifications\": \"Optional Specification\",\n                    \"images\": [\n                        \"http://compower.local/uploads/products/45949_product.jpg\",\n                        \"http://compower.local/uploads/products/37868_product.jpg\"\n                    ],\n                    \"charts\": [\n                        \"http://compower.local/uploads/charts/85053_chart.jpg\"\n                    ],\n                    \"pdfs\": [\n                        {\n                            \"title\": \"Title - 1\",\n                            \"pdf\": \"http://compower.local/uploads/pdf/37947_pdf.jpg\"\n                        }\n                    ]\n                }\n            ]\n        }\n    ],\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response ( Invalid Input ):",
          "content": "{\n    \"error\": {\n        \"message\": \"Unable to find Category!\"\n    },\n    \"status\": false,\n    \"message\": \"No Category Found !\",\n    \"code\": 400\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Category",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/category"
      }
    ]
  },
  {
    "type": "post",
    "url": "category-filter",
    "title": "Filter Category List ( Need Headers)",
    "name": "category_filter",
    "group": "Category",
    "parameter": {
      "fields": {
        "Category": [
          {
            "group": "Category",
            "type": "string",
            "optional": false,
            "field": "title",
            "description": "<p>Category Title (Free text) - Required</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n     \"data\": [\n         {\n             \"category_id\": 1,\n             \"category_title\": \"Antenna - Updated\",\n             \"products\": [\n                 {\n                     \"product_id\": 1,\n                     \"title\": \"Test Proudct\",\n                     \"model\": \"Modal - 001\",\n                     \"qty\": 250,\n                     \"price\": 1000,\n                     \"description\": \"This is Lorem Ipusm test things.\",\n                     \"features\": \"Special Features\",\n                     \"specifications\": \"Specal Specification\",\n                     \"images\": [\n                         \"http://compower.local/uploads/products/31797_product.jpg\",\n                         \"http://compower.local/uploads/products/85576_product.jpg\",\n                         \"http://compower.local/uploads/products/68294_product.jpg\"\n                     ],\n                     \"charts\": [\n                         \"http://compower.local/uploads/charts/85709_chart.jpg\",\n                         \"http://compower.local/uploads/charts/70282_chart.jpg\"\n                     ],\n                     \"pdfs\": [\n                         {\n                             \"title\": \"PDF 1\",\n                             \"pdf\": \"http://compower.local/uploads/pdf/13709_pdf.jpg\"\n                         },\n                         {\n                             \"title\": \"PDF TItle 2\",\n                             \"pdf\": \"http://compower.local/uploads/pdf/41750_pdf.jpg\"\n                         }\n                     ]\n                 }\n             ]\n         },\n         {\n             \"category_id\": 2,\n             \"category_title\": \"Absorbing Clamps\",\n             \"products\": [\n                 {\n                     \"product_id\": 3,\n                     \"title\": \"Absorbing Clamp - 12\",\n                     \"model\": \"AB - 2018\",\n                     \"qty\": 2500,\n                     \"price\": 250.5,\n                     \"description\": \"this is description\\r\\n\\r\\nMultiline Test\\r\\n\\r\\nTHird Line\",\n                     \"features\": \"Frequency - 100 MHZ\\r\\n\\r\\nHuman Readable\\r\\n\\r\\nBits / Byte - Calculated\",\n                     \"specifications\": \"Optional Specification\",\n                     \"images\": [\n                         \"http://compower.local/uploads/products/45949_product.jpg\",\n                         \"http://compower.local/uploads/products/37868_product.jpg\"\n                     ],\n                     \"charts\": [\n                         \"http://compower.local/uploads/charts/85053_chart.jpg\"\n                     ],\n                     \"pdfs\": [\n                         {\n                             \"title\": \"Title - 1\",\n                             \"pdf\": \"http://compower.local/uploads/pdf/37947_pdf.jpg\"\n                         }\n                     ]\n                 }\n             ]\n         }\n     ],\n     \"status\": true,\n     \"message\": \"Success\",\n     \"code\": 200\n }",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response ( Invalid Input ):",
          "content": "{\n    \"error\": {\n        \"message\": \"Unable to find Category!\"\n    },\n    \"status\": false,\n    \"message\": \"No Category Found !\",\n    \"code\": 400\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Category",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/category-filter"
      }
    ]
  },
  {
    "type": "post",
    "url": "category/show",
    "title": "Single Category List ( Need Headers)",
    "name": "category_show",
    "group": "Category",
    "parameter": {
      "fields": {
        "Category": [
          {
            "group": "Category",
            "type": "integer",
            "optional": false,
            "field": "category_id",
            "description": "<p>Category Id - Required</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    {\n    \"data\": [\n        {\n            \"category_id\": 1,\n            \"category_title\": \"Antenna - Updated\",\n            \"products\": [\n                {\n                    \"product_id\": 1,\n                    \"title\": \"Test Proudct\",\n                    \"model\": \"Modal - 001\",\n                    \"qty\": 250,\n                    \"price\": 1000,\n                    \"description\": \"This is Lorem Ipusm test things.\",\n                    \"features\": \"Special Features\",\n                    \"specifications\": \"Specal Specification\",\n                    \"images\": [\n                        \"http://compower.local/uploads/products/31797_product.jpg\",\n                        \"http://compower.local/uploads/products/85576_product.jpg\",\n                        \"http://compower.local/uploads/products/68294_product.jpg\"\n                    ],\n                    \"charts\": [\n                        \"http://compower.local/uploads/charts/85709_chart.jpg\",\n                        \"http://compower.local/uploads/charts/70282_chart.jpg\"\n                    ],\n                    \"pdfs\": [\n                        {\n                            \"title\": \"PDF 1\",\n                            \"pdf\": \"http://compower.local/uploads/pdf/13709_pdf.jpg\"\n                        },\n                        {\n                            \"title\": \"PDF TItle 2\",\n                            \"pdf\": \"http://compower.local/uploads/pdf/41750_pdf.jpg\"\n                        }\n                    ]\n                }\n            ]\n        },\n        {\n            \"category_id\": 2,\n            \"category_title\": \"Absorbing Clamps\",\n            \"products\": [\n                {\n                    \"product_id\": 3,\n                    \"title\": \"Absorbing Clamp - 12\",\n                    \"model\": \"AB - 2018\",\n                    \"qty\": 2500,\n                    \"price\": 250.5,\n                    \"description\": \"this is description\\r\\n\\r\\nMultiline Test\\r\\n\\r\\nTHird Line\",\n                    \"features\": \"Frequency - 100 MHZ\\r\\n\\r\\nHuman Readable\\r\\n\\r\\nBits / Byte - Calculated\",\n                    \"specifications\": \"Optional Specification\",\n                    \"images\": [\n                        \"http://compower.local/uploads/products/45949_product.jpg\",\n                        \"http://compower.local/uploads/products/37868_product.jpg\"\n                    ],\n                    \"charts\": [\n                        \"http://compower.local/uploads/charts/85053_chart.jpg\"\n                    ],\n                    \"pdfs\": [\n                        {\n                            \"title\": \"Title - 1\",\n                            \"pdf\": \"http://compower.local/uploads/pdf/37947_pdf.jpg\"\n                        }\n                    ]\n                }\n            ]\n        }\n    ],\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response ( Invalid Input ):",
          "content": "{\n    \"error\": {\n        \"message\": \"Unable to find Category!\"\n    },\n    \"status\": false,\n    \"message\": \"No Category Found !\",\n    \"code\": 400\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Category",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/category/show"
      }
    ]
  },
  {
    "type": "post",
    "url": "products-filter",
    "title": "Products Filter List ( Need Headers)",
    "name": "products_filter",
    "group": "Category",
    "parameter": {
      "fields": {
        "Category": [
          {
            "group": "Category",
            "type": "string",
            "optional": false,
            "field": "title",
            "description": "<p>Title - Required</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n    \"data\": [\n        {\n            \"product_id\": 3,\n            \"category_id\": 2,\n            \"category_title\": \"Absorbing Clamps\",\n            \"title\": \"Absorbing Clamp - 12\",\n            \"model\": \"AB - 2018\",\n            \"qty\": 2500,\n            \"price\": 250.5,\n            \"description\": \"this is description\\r\\n\\r\\nMultiline Test\\r\\n\\r\\nTHird Line\",\n            \"features\": \"Frequency - 100 MHZ\\r\\n\\r\\nHuman Readable\\r\\n\\r\\nBits / Byte - Calculated\",\n            \"specifications\": \"Optional Specification\",\n            \"images\": [\n                \"http://compower.local/uploads/products/45949_product.jpg\",\n                \"http://compower.local/uploads/products/37868_product.jpg\"\n            ],\n            \"charts\": [\n                \"http://compower.local/uploads/charts/85053_chart.jpg\"\n            ],\n            \"pdfs\": [\n                {\n                    \"title\": \"Title - 1\",\n                    \"pdf\": \"http://compower.local/uploads/pdf/37947_pdf.jpg\"\n                }\n            ]\n        }\n    ],\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response ( Invalid input ):",
          "content": "{\n    \"error\": {\n        \"message\": \"Unable to find Product!\"\n    },\n    \"status\": false,\n    \"message\": \"No Products Found !\",\n    \"code\": 400\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Category",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/products-filter"
      }
    ]
  },
  {
    "type": "get",
    "url": "config",
    "title": "Config ( No Headers Needed)",
    "name": "config",
    "group": "Config",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n    \"data\": {\n        \"support_number\": \"110001010\",\n        \"privacy_policy_url\": \"https://www.google.co.in/\"\n    },\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Config",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/config"
      }
    ]
  },
  {
    "type": "post",
    "url": "forgotpassword",
    "title": "Forgot Password",
    "name": "forgotpassword",
    "group": "Login",
    "parameter": {
      "fields": {
        "Login": [
          {
            "group": "Login",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": "<p>Email Id ( Valid Email )  - Required</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n     \"data\": {\n         \"message\": \"Reset Password Mail send successfully.\"\n     },\n     \"status\": true,\n     \"message\": \"Success\",\n     \"code\": 200\n }",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response - Invalid Input ( Email Missing ) :",
          "content": "{\n    \"error\": {\n        \"reason\": \"Invalid Inputs\"\n    },\n    \"status\": false,\n    \"message\": \"Something went wrong !\",\n    \"code\": 400\n}",
          "type": "json"
        },
        {
          "title": "Error-Response - User Not Found :",
          "content": "    {\n    \"error\": {\n        \"error\": \"User not Found !\"\n    },\n    \"status\": false,\n    \"message\": \"Something went wrong !\",\n    \"code\": 400\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Login",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/forgotpassword"
      }
    ]
  },
  {
    "type": "post",
    "url": "login",
    "title": "Login App",
    "name": "login",
    "group": "Login",
    "parameter": {
      "fields": {
        "Login": [
          {
            "group": "Login",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": "<p>Email Id ( Valid Email )  - Required</p>"
          },
          {
            "group": "Login",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>Password - Required</p>"
          },
          {
            "group": "Login",
            "type": "string",
            "optional": false,
            "field": "device_token",
            "description": "<p>Device-Token - Required</p>"
          },
          {
            "group": "Login",
            "type": "integer",
            "optional": false,
            "field": "device_type",
            "description": "<p>Device-Type ( 1 / 2) - Required</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n    \"data\": {\n        \"user_id\": 3,\n        \"user_token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMsImlzcyI6Imh0dHA6XC9cL2NvbXBvd2VyLmxvY2FsXC9hcGlcL2xvZ2luIiwiaWF0IjoxNTI2ODc4MjA4LCJleHAiOjE1NTg0MTQyMDgsIm5iZiI6MTUyNjg3ODIwOCwianRpIjoiU2xXNmpmNnhhaDBrQWtLcyJ9.x0NsZNHZe517mNKKxrfIY9M4IUDp-LVeW-4bWNP1cEU\",\n        \"device_token\": \"12kjerl3kjKDL343\",\n        \"name\": \"KB\",\n        \"email\": \"user@user.com\",\n        \"company_name\": \"Adroit\",\n        \"mobile\": \"2255244\",\n        \"profile_pic\": \"http://compower.local/uploads/user/C:\\\\Users\\\\user\\\\AppData\\\\Local\\\\Temp\\\\php9BF6.tmp\",\n        \"device_type\": \"1\",\n        \"address\": \"C G Road - Updated\",\n        \"city\": \"Abad\",\n        \"state\": \"Gujarat\",\n        \"zip\": \"234893\",\n        \"country\": \"India\",\n        \"notification_count\": 0\n    },\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n    \"error\": \"Invalid Credentials\",\n    \"message\": \"No User Found for given details\",\n    \"status\": false\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Login",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/login"
      }
    ]
  },
  {
    "type": "get",
    "url": "logout",
    "title": "Logout ( Need Headers)",
    "name": "logout",
    "group": "Logout",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n    \"data\": {\n        \"message\": \"User Logged out successfully.\"\n    },\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response ( User Not Found ):",
          "content": "{\n    \"error\": {\n        \"reason\": \"User Not Found !\"\n    },\n    \"status\": false,\n    \"message\": \"User Not Found !\",\n    \"code\": 400\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Logout",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/logout"
      }
    ]
  },
  {
    "type": "get",
    "url": "notifications",
    "title": "Notifications ( Need Headers)",
    "name": "notifications",
    "group": "Notifications",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n    \"data\": [\n        {\n            \"notification_id\": 1,\n            \"user_id\": 3,\n            \"description\": \"This is testing Notification\",\n            \"icon\": \"http://compower.local/uploads/notifications/default.png\",\n            \"is_read\": 1\n        },\n        {\n            \"notification_id\": 2,\n            \"user_id\": 3,\n            \"description\": \"Second Notification\",\n            \"icon\": \"http://compower.local/uploads/notifications/default.png\",\n            \"is_read\": 0\n        }\n    ],\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response (No Notifications Found ):",
          "content": "{\n    \"error\": {\n        \"message\": \"Unable to find Notifications!\"\n    },\n    \"status\": false,\n    \"message\": \"No Notifications Found !\",\n    \"code\": 400\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Notifications",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/notifications"
      }
    ]
  },
  {
    "type": "get",
    "url": "orders",
    "title": "User Orders ( Need Headers)",
    "name": "orders",
    "group": "Orders",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    {\n    \"data\": [\n        {\n            \"order_id\": 1,\n            \"order_number\": \"1110291\",\n            \"order_total\": 1500,\n            \"description\": \"this is test order\",\n            \"order_status\": \"Pending\",\n            \"items\": [\n                {\n                    \"product_id\": 1,\n                    \"product_title\": \"Test Proudct\",\n                    \"product_model\": \"Modal - 001\",\n                    \"product_image\": \"http://compower.local/uploads/products/31797_product.jpg\",\n                    \"qty\": 3,\n                    \"price\": 45,\n                    \"item_total\": 135,\n                    \"shipping_date\": \"05 May 2018\",\n                    \"item_status\"  : 'Pending',\n                    \"expected_date\": \"Before 10 May 2018\"\n                },\n                {\n                    \"product_id\": 2,\n                    \"product_title\": \"Product 2\",\n                    \"product_model\": \"Modla - 2\",\n                    \"product_image\": \"http://compower.local/uploads/products/51936_product.jpg\",\n                    \"qty\": 15,\n                    \"price\": 80,\n                    \"item_total\": 1200,\n                    \"item_status\"  : 'Pending',\n                    \"shipping_date\": \"02 January 2018\",\n                    \"expected_date\": \"Before 06 May 2018\"\n                }\n            ]\n        },\n        {\n            \"order_id\": 2,\n            \"order_number\": \"1192389\",\n            \"order_total\": 36900,\n            \"description\": \"This is second order\",\n            \"order_status\": \"Completed\",\n            \"is_past\": 1,\n            \"items\": [\n                {\n                    \"product_id\": 1,\n                    \"product_title\": \"Test Proudct\",\n                    \"product_model\": \"Modal - 001\",\n                    \"product_image\": \"http://compower.local/uploads/products/31797_product.jpg\",\n                    \"qty\": 10,\n                    \"price\": 100,\n                    \"item_total\": 1000,\n                    \"item_status\"  : 'Pending',\n                    \"shipping_date\": \"05 May 2018\",\n                    \"expected_date\": \"Before 05 May 2018\"\n                },\n                {\n                    \"product_id\": 3,\n                    \"product_title\": \"Absorbing Clamp - 12\",\n                    \"product_model\": \"AB - 2018\",\n                    \"product_image\": \"http://compower.local/uploads/products/45949_product.jpg\",\n                    \"qty\": 6,\n                    \"price\": 80,\n                    \"item_total\": 480,\n                    \"item_status\"  : 'Pending',\n                    \"shipping_date\": \"05 May 2018\",\n                    \"expected_date\": \"Before 05 May 2018\"\n                }\n            ]\n        }\n    ],\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response (No Orders Found ):",
          "content": "{\n    \"error\": {\n        \"message\": \"Unable to find Orders!\"\n    },\n    \"status\": false,\n    \"message\": \"No Orders Found !\",\n    \"code\": 400\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Orders",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/orders"
      }
    ]
  },
  {
    "type": "get",
    "url": "orders/past",
    "title": "Past Orders ( Need Headers)",
    "name": "orders_past",
    "group": "Orders",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "    {\n    \"data\": [\n        {\n            \"order_id\": 1,\n            \"order_number\": \"1110291\",\n            \"order_total\": 1500,\n            \"description\": \"this is test order\",\n            \"order_status\": \"Pending\",\n            \"items\": [\n                {\n                    \"product_id\": 1,\n                    \"product_title\": \"Test Proudct\",\n                    \"product_model\": \"Modal - 001\",\n                    \"product_image\": \"http://compower.local/uploads/products/31797_product.jpg\",\n                    \"qty\": 3,\n                    \"price\": 45,\n                    \"item_total\": 135,\n                    \"item_status\"  : 'Pending',\n                    \"shipping_date\": \"05 May 2018\",\n                    \"expected_date\": \"Before 10 May 2018\"\n                },\n                {\n                    \"product_id\": 2,\n                    \"product_title\": \"Product 2\",\n                    \"product_model\": \"Modla - 2\",\n                    \"product_image\": \"http://compower.local/uploads/products/51936_product.jpg\",\n                    \"qty\": 15,\n                    \"price\": 80,\n                    \"item_total\": 1200,\n                    \"item_status\"  : 'Pending',\n                    \"shipping_date\": \"02 January 2018\",\n                    \"expected_date\": \"Before 06 May 2018\"\n                }\n            ]\n        },\n        {\n            \"order_id\": 2,\n            \"order_number\": \"1192389\",\n            \"order_total\": 36900,\n            \"description\": \"This is second order\",\n            \"order_status\": \"Completed\",\n            \"is_past\": 1,\n            \"items\": [\n                {\n                    \"product_id\": 1,\n                    \"product_title\": \"Test Proudct\",\n                    \"product_model\": \"Modal - 001\",\n                    \"product_image\": \"http://compower.local/uploads/products/31797_product.jpg\",\n                    \"qty\": 10,\n                    \"price\": 100,\n                    \"item_total\": 1000,\n                    \"shipping_date\": \"05 May 2018\",\n                    \"item_status\"  : 'Pending',\n                    \"expected_date\": \"Before 05 May 2018\"\n                },\n                {\n                    \"product_id\": 3,\n                    \"product_title\": \"Absorbing Clamp - 12\",\n                    \"product_model\": \"AB - 2018\",\n                    \"product_image\": \"http://compower.local/uploads/products/45949_product.jpg\",\n                    \"qty\": 6,\n                    \"price\": 80,\n                    \"item_total\": 480,\n                    \"item_status\"  : 'Pending',\n                    \"shipping_date\": \"05 May 2018\",\n                    \"expected_date\": \"Before 05 May 2018\"\n                }\n            ]\n        }\n    ],\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response (No Orders Found ):",
          "content": "{\n    \"error\": {\n        \"message\": \"Unable to find Orders!\"\n    },\n    \"status\": false,\n    \"message\": \"No Orders Found !\",\n    \"code\": 400\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Orders",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/orders/past"
      }
    ]
  },
  {
    "type": "get",
    "url": "products",
    "title": "Products  List ( Need Headers)",
    "name": "products",
    "group": "Product",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n    \"data\": [\n        {\n            \"product_id\": 1,\n            \"category_id\": 1,\n            \"category_title\": \"Antenna - Updated\",\n            \"title\": \"Test Proudct\",\n            \"model\": \"Modal - 001\",\n            \"qty\": 250,\n            \"price\": 1000,\n            \"description\": \"This is Lorem Ipusm test things.\",\n            \"features\": \"Special Features\",\n            \"specifications\": \"Specal Specification\",\n            \"images\": [\n                \"http://compower.local/uploads/products/31797_product.jpg\",\n                \"http://compower.local/uploads/products/85576_product.jpg\",\n                \"http://compower.local/uploads/products/68294_product.jpg\"\n            ],\n            \"charts\": [\n                \"http://compower.local/uploads/charts/85709_chart.jpg\",\n                \"http://compower.local/uploads/charts/70282_chart.jpg\"\n            ],\n            \"pdfs\": [\n                {\n                    \"title\": \"PDF 1\",\n                    \"pdf\": \"http://compower.local/uploads/pdf/13709_pdf.jpg\"\n                },\n                {\n                    \"title\": \"PDF TItle 2\",\n                    \"pdf\": \"http://compower.local/uploads/pdf/41750_pdf.jpg\"\n                }\n            ]\n        },\n        {\n            \"product_id\": 2,\n            \"category_id\": 1,\n            \"category_title\": \"Antenna - Updated\",\n            \"title\": \"Product 2\",\n            \"model\": \"Modla - 2\",\n            \"qty\": 1000,\n            \"price\": 47924,\n            \"description\": \"Thi sis Prduc\",\n            \"features\": \"This is features\",\n            \"specifications\": \"Specifications\",\n            \"images\": [\n                \"http://compower.local/uploads/products/51936_product.jpg\"\n            ],\n            \"charts\": [\n                \"http://compower.local/uploads/charts/59865_chart.jpg\"\n            ],\n            \"pdfs\": [\n                {\n                    \"title\": \"View Best Performance\",\n                    \"pdf\": \"http://compower.local/uploads/pdf/92445_pdf.jpg\"\n                },\n                {\n                    \"title\": \"View Best Performance - 2\",\n                    \"pdf\": \"http://compower.local/uploads/pdf/11403_pdf.jpg\"\n                }\n            ]\n        },\n        {\n            \"product_id\": 3,\n            \"category_id\": 2,\n            \"category_title\": \"Absorbing Clamps\",\n            \"title\": \"Absorbing Clamp - 12\",\n            \"model\": \"AB - 2018\",\n            \"qty\": 2500,\n            \"price\": 250.5,\n            \"description\": \"this is description\\r\\n\\r\\nMultiline Test\\r\\n\\r\\nTHird Line\",\n            \"features\": \"Frequency - 100 MHZ\\r\\n\\r\\nHuman Readable\\r\\n\\r\\nBits / Byte - Calculated\",\n            \"specifications\": \"Optional Specification\",\n            \"images\": [\n                \"http://compower.local/uploads/products/45949_product.jpg\",\n                \"http://compower.local/uploads/products/37868_product.jpg\"\n            ],\n            \"charts\": [\n                \"http://compower.local/uploads/charts/85053_chart.jpg\"\n            ],\n            \"pdfs\": [\n                {\n                    \"title\": \"Title - 1\",\n                    \"pdf\": \"http://compower.local/uploads/pdf/37947_pdf.jpg\"\n                }\n            ]\n        }\n    ],\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response (No Product Found ):",
          "content": "{\n    \"error\": {\n        \"message\": \"Unable to find Products!\"\n    },\n    \"status\": false,\n    \"message\": \"No Products Found !\",\n    \"code\": 400\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Product",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/products"
      }
    ]
  },
  {
    "type": "post",
    "url": "products/show",
    "title": "Single Product By ID ( Need Headers)",
    "name": "products_show",
    "group": "Product",
    "parameter": {
      "fields": {
        "Product": [
          {
            "group": "Product",
            "type": "integer",
            "optional": false,
            "field": "product_id",
            "description": "<p>Product Id - Required</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n    \"data\": {\n        \"product_id\": 1,\n        \"category_id\": 1,\n        \"category_title\": \"Antenna - Updated\",\n        \"title\": \"Test Proudct\",\n        \"model\": \"Modal - 001\",\n        \"qty\": 250,\n        \"price\": 1000,\n        \"description\": \"This is Lorem Ipusm test things.\",\n        \"features\": \"Special Features\",\n        \"specifications\": \"Specal Specification\",\n        \"images\": [\n            \"http://compower.local/uploads/products/31797_product.jpg\",\n            \"http://compower.local/uploads/products/85576_product.jpg\",\n            \"http://compower.local/uploads/products/68294_product.jpg\"\n        ],\n        \"charts\": [\n            \"http://compower.local/uploads/charts/85709_chart.jpg\",\n            \"http://compower.local/uploads/charts/70282_chart.jpg\"\n        ],\n        \"pdfs\": [\n            {\n                \"title\": \"PDF 1\",\n                \"pdf\": \"http://compower.local/uploads/pdf/13709_pdf.jpg\"\n            },\n            {\n                \"title\": \"PDF TItle 2\",\n                \"pdf\": \"http://compower.local/uploads/pdf/41750_pdf.jpg\"\n            }\n        ]\n    },\n    \"status\": true,\n    \"message\": \"View Item\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response ( Invalid input ):",
          "content": "{\n    \"error\": {\n        \"message\": \"Unable to find Product!\"\n    },\n    \"status\": false,\n    \"message\": \"No Products Found !\",\n    \"code\": 400\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Product",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/products/show"
      }
    ]
  },
  {
    "type": "post",
    "url": "update-password",
    "title": "Update Password ( Need Headers)",
    "name": "update_password",
    "group": "Profile",
    "parameter": {
      "fields": {
        "Profile": [
          {
            "group": "Profile",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>User Password - Required</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n    \"data\": {\n        \"message\": \"Password Updated successfully.\"\n    },\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response - Invalid Input ( Email Missing ) :",
          "content": "{\n    \"error\": {\n        \"password\": [\n            \"The password field is required.\"\n        ]\n    },\n    \"status\": false,\n    \"message\": \"The password field is required.\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Profile",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/update-password"
      }
    ]
  },
  {
    "type": "post",
    "url": "update-user-profile",
    "title": "Update User Profile ( Need Headers)",
    "name": "update_user_profile",
    "group": "Profile",
    "parameter": {
      "fields": {
        "Register": [
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "name",
            "description": "<p>User Name - Required</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "mobile",
            "description": "<p>Mobile Contact - Optional</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "device_token",
            "description": "<p>Device Token - Optional</p>"
          },
          {
            "group": "Register",
            "type": "integer",
            "optional": false,
            "field": "device_type",
            "description": "<p>iOS/Android(1/2) - Optional</p>"
          },
          {
            "group": "Register",
            "type": "integer",
            "optional": false,
            "field": "user_type",
            "description": "<p>Parent/Sitter( 1 / 2) - Optional</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "company_name",
            "description": "<p>Company Name - Optional</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "address",
            "description": "<p>User Address - Optional</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "city",
            "description": "<p>User City - Optional</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "state",
            "description": "<p>User State - Optional</p>"
          },
          {
            "group": "Register",
            "type": "integer",
            "optional": false,
            "field": "zip",
            "description": "<p>User Zip - Optional</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "country",
            "description": "<p>User Country - Optional</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "profile_pic",
            "description": "<p>User Avatar ( Image file ) - Optional</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n    \"data\": {\n        \"user_id\": 3,\n        \"user_token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMsImlzcyI6Imh0dHA6XC9cL2NvbXBvd2VyLmxvY2FsXC9hcGlcL2xvZ2luIiwiaWF0IjoxNTI2ODA1NjY2LCJleHAiOjE1NTgzNDE2NjYsIm5iZiI6MTUyNjgwNTY2NiwianRpIjoiR05idE84ZEpiamFpYThQMCJ9.nNCqSzyyEH0imkSbyNLq9vTB7lFLpN2ZarUAFp_0VKE\",\n        \"device_token\": \"21D8347DTB4509\",\n        \"name\": \"KB\",\n        \"email\": \"user@user.com\",\n        \"company_name\": \"Adroit\",\n        \"mobile\": \"2255244\",\n        \"profile_pic\": \"http://compower.local/uploads/user/70925_user.jpg\",\n        \"device_type\": \"1\",\n        \"address\": \"C G Road - Updated\",\n        \"city\": \"Abad\",\n        \"state\": \"Gujarat\",\n        \"zip\": \"234893\",\n        \"country\": \"India\",\n        \"notification_count\": 0\n    },\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n    \"error\": {\n        \"name\": [\n            \"The name field is required.\"\n        ]\n    },\n    \"status\": false,\n    \"message\": \"The name field is required.\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Profile",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/update-user-profile"
      }
    ]
  },
  {
    "type": "post",
    "url": "user-profile",
    "title": "User Profile ( Need Headers)",
    "name": "user_profile",
    "group": "Profile",
    "parameter": {
      "fields": {
        "Profile": [
          {
            "group": "Profile",
            "type": "integer",
            "optional": false,
            "field": "user_id",
            "description": "<p>User Id - Required</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n     \"data\": {\n         \"user_id\": 3,\n         \"user_token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMsImlzcyI6Imh0dHA6XC9cL2NvbXBvd2VyLmxvY2FsXC9hcGlcL2xvZ2luIiwiaWF0IjoxNTI2ODA1NjY2LCJleHAiOjE1NTgzNDE2NjYsIm5iZiI6MTUyNjgwNTY2NiwianRpIjoiR05idE84ZEpiamFpYThQMCJ9.nNCqSzyyEH0imkSbyNLq9vTB7lFLpN2ZarUAFp_0VKE\",\n         \"device_token\": \"21D8347DTB4509\",\n         \"name\": \"KB\",\n         \"email\": \"user@user.com\",\n         \"company_name\": \"Adroit\",\n         \"mobile\": \"2255244\",\n         \"profile_pic\": \"http://compower.local/uploads/user/70925_user.jpg\",\n         \"device_type\": \"1\",\n         \"address\": \"C G Road - Updated\",\n         \"city\": \"Abad\",\n         \"state\": \"Gujarat\",\n         \"zip\": \"234893\",\n         \"country\": \"India\",\n         \"notification_count\": 0\n     },\n     \"status\": true,\n     \"message\": \"Success\",\n     \"code\": 200\n }",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response - Invalid Input ( Name Required ) :",
          "content": "{\n    \"error\": {\n        \"reason\": \"Invalid Inputs\"\n    },\n    \"status\": false,\n    \"message\": \"Something went wrong !\",\n    \"code\": 400\n}",
          "type": "json"
        },
        {
          "title": "Error-Response - User Not Found :",
          "content": "{\n    \"error\": {\n        \"error\": \"User not Found !\"\n    },\n    \"status\": false,\n    \"message\": \"Something went wrong !\",\n    \"code\": 400\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Profile",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/user-profile"
      }
    ]
  },
  {
    "type": "post",
    "url": "register",
    "title": "Signup/Register User",
    "name": "register",
    "group": "Signup_Register",
    "parameter": {
      "fields": {
        "Register": [
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "name",
            "description": "<p>User Name - Required</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>Password - Required</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": "<p>Email Id ( Valid Email )  - Required</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "company_name",
            "description": "<p>Company Name  - Required</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "mobile",
            "description": "<p>Mobile Contact - Optional</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "device_token",
            "description": "<p>Device Token - Optional</p>"
          },
          {
            "group": "Register",
            "type": "integer",
            "optional": false,
            "field": "device_type",
            "description": "<p>iOS/Android(1/2) - Optional</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "address",
            "description": "<p>User Address - Optional</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "city",
            "description": "<p>User City - Optional</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "state",
            "description": "<p>User State - Optional</p>"
          },
          {
            "group": "Register",
            "type": "integer",
            "optional": false,
            "field": "zip",
            "description": "<p>User Zip - Optional</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "country",
            "description": "<p>User Country - Optional</p>"
          },
          {
            "group": "Register",
            "type": "string",
            "optional": false,
            "field": "profile_pic",
            "description": "<p>User Avatar ( Image file ) - Optional</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n    \"data\": {\n        \"user_id\": 11,\n        \"user_token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjExLCJpc3MiOiJodHRwOlwvXC9jb21wb3dlci5sb2NhbFwvYXBpXC9yZWdpc3RlciIsImlhdCI6MTUyNjg3ODQ1NywiZXhwIjoxNTU4NDE0NDU3LCJuYmYiOjE1MjY4Nzg0NTcsImp0aSI6InA0cndwU0c1NERsQ0lQejEifQ.i6GLq8R9Ql-zFG0My6RlqTuI_EF9UM-hq56EN5vRcZ8\",\n        \"device_token\": \"21D8347DTB4509\",\n        \"name\": \"KB\",\n        \"email\": \"userk12134@user.com\",\n        \"company_name\": \"Adroit\",\n        \"mobile\": \"2255244\",\n        \"profile_pic\": \"http://compower.local/uploads/user/default.png\",\n        \"device_type\": \"1\",\n        \"address\": \"C G Road\",\n        \"city\": \"ahmedabad\",\n        \"state\": \"Gujarat\",\n        \"zip\": \"234893\",\n        \"country\": \"\",\n        \"notification_count\": 0\n    },\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n    \"error\": {\n        \"email\": [\n            \"The email has already been taken.\"\n        ]\n    },\n    \"status\": false,\n    \"message\": \"The email has already been taken.\",\n    \"code\": 200\n}",
          "type": "json"
        },
        {
          "title": "Error-Response:",
          "content": "{\n    \"error\": {\n        \"password\": [\n            \"The password field is required.\"\n        ]\n    },\n    \"status\": false,\n    \"message\": \"The password field is required.\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Signup_Register",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/register"
      }
    ]
  },
  {
    "type": "get",
    "url": "techcategories",
    "title": "Tech Notes ( Need Headers)",
    "name": "techcategories",
    "group": "Tech_Notes",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n    \"data\": [\n        {\n            \"category_id\": 1,\n            \"title\": \"Tech 1\",\n            \"notes\": [\n                {\n                    \"note_id\": 1,\n                    \"title\": \"Tech 1\",\n                    \"additional_link\": \"http://compower.local/uploads/products/default.png\"\n                },\n                {\n                    \"note_id\": 2,\n                    \"title\": \"Tech Note 2\",\n                    \"additional_link\": \"http://compower.local/uploads/products/default.png\"\n                }\n            ]\n        },\n        {\n            \"category_id\": 2,\n            \"title\": \"Tech Note 2\",\n            \"notes\": []\n        }\n    ],\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response (No Notes Found ):",
          "content": "{\n    \"error\": {\n        \"message\": \"Unable to find Notes!\"\n    },\n    \"status\": false,\n    \"message\": \"No Notes Found !\",\n    \"code\": 400\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "compower-input/example.js",
    "groupTitle": "Tech_Notes",
    "sampleRequest": [
      {
        "url": "http://35.154.84.230/compower/public/api/techcategories"
      }
    ]
  }
] });
