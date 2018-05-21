define({ "api": [
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
          "content": "{\n    \"data\": {\n        \"total_items\": 2,\n        \"cart_total\": 49176.5,\n        \"items\": [\n            {\n                \"cart_id\": 11,\n                \"user_id\": 3,\n                \"product_id\": 3,\n                \"qty\": 5,\n                \"title\": \"Absorbing Clamp - 12\",\n                \"model\": \"AB - 2018\",\n                \"price\": 250.5,\n                \"total\": 1252.5,\n                \"image_1\": \"http://compower.local/uploads/products/45949_product.jpg\",\n                \"image_2\": \"http://compower.local/uploads/products/37868_product.jpg\",\n                \"image_3\": \"\",\n                \"image_4\": \"\",\n                \"image_5\": \"\"\n            },\n            {\n                \"cart_id\": 21,\n                \"user_id\": 3,\n                \"product_id\": 2,\n                \"qty\": 1,\n                \"title\": \"Product 2\",\n                \"model\": \"Modla - 2\",\n                \"price\": 47924,\n                \"total\": 47924,\n                \"image_1\": \"http://compower.local/uploads/products/51936_product.jpg\",\n                \"image_2\": \"\",\n                \"image_3\": \"\",\n                \"image_4\": \"\",\n                \"image_5\": \"\"\n            }\n        ]\n    },\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
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
          "content": "{\n    \"data\": {\n        \"total_items\": 1,\n        \"cart_total\": 1252.5,\n        \"items\": [\n            {\n                \"cart_id\": 11,\n                \"user_id\": 3,\n                \"product_id\": 3,\n                \"qty\": 5,\n                \"title\": \"Absorbing Clamp - 12\",\n                \"model\": \"AB - 2018\",\n                \"price\": 250.5,\n                \"total\": 1252.5,\n                \"image_1\": \"http://compower.local/uploads/products/45949_product.jpg\",\n                \"image_2\": \"http://compower.local/uploads/products/37868_product.jpg\",\n                \"image_3\": \"\",\n                \"image_4\": \"\",\n                \"image_5\": \"\"\n            }\n        ]\n    },\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
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
          "content": "{\n    \"data\": [\n        {\n            \"category_id\": 1,\n            \"category_title\": \"Antenna - Updated\",\n            \"products\": [\n                {\n                    \"product_id\": 1,\n                    \"title\": \"Test Proudct\",\n                    \"model\": \"Modal - 001\",\n                    \"qty\": 250,\n                    \"price\": 1000,\n                    \"description\": \"This is Lorem Ipusm test things.\",\n                    \"features\": \"Special Features\",\n                    \"specifications\": \"Specal Specification\",\n                    \"image_1\": \"http://compower.local/uploads/products/31797_product.jpg\",\n                    \"image_2\": \"http://compower.local/uploads/products/85576_product.jpg\",\n                    \"image_3\": \"http://compower.local/uploads/products/68294_product.jpg\",\n                    \"image_4\": \"\",\n                    \"image_5\": \"\",\n                    \"chart_1\": \"http://compower.local/uploads/charts/85709_chart.jpg\",\n                    \"chart_2\": \"http://compower.local/uploads/charts/70282_chart.jpg\",\n                    \"chart_3\": \"\",\n                    \"pdf_title_1\": \"PDF 1\",\n                    \"pdf_1\": \"http://compower.local/uploads/pdf/13709_pdf.jpg\",\n                    \"pdf_title_2\": \"PDF TItle 2\",\n                    \"pdf_2\": \"http://compower.local/uploads/pdf/41750_pdf.jpg\",\n                    \"pdf_title_3\": \"\",\n                    \"pdf_3\": \"\"\n                },\n                {\n                    \"product_id\": 2,\n                    \"title\": \"Product 2\",\n                    \"model\": \"Modla - 2\",\n                    \"qty\": 1000,\n                    \"price\": 47924,\n                    \"description\": \"Thi sis Prduc\",\n                    \"features\": \"This is features\",\n                    \"specifications\": \"Specifications\",\n                    \"image_1\": \"http://compower.local/uploads/products/51936_product.jpg\",\n                    \"image_2\": \"\",\n                    \"image_3\": \"\",\n                    \"image_4\": \"\",\n                    \"image_5\": \"\",\n                    \"chart_1\": \"http://compower.local/uploads/charts/59865_chart.jpg\",\n                    \"chart_2\": \"\",\n                    \"chart_3\": \"\",\n                    \"pdf_title_1\": \"View Best Performance\",\n                    \"pdf_1\": \"http://compower.local/uploads/pdf/92445_pdf.jpg\",\n                    \"pdf_title_2\": \"View Best Performance - 2\",\n                    \"pdf_2\": \"http://compower.local/uploads/pdf/11403_pdf.jpg\",\n                    \"pdf_title_3\": \"\",\n                    \"pdf_3\": \"\"\n                }\n            ]\n        },\n        {\n            \"category_id\": 2,\n            \"category_title\": \"Absorbing Clamps\",\n            \"products\": [\n                {\n                    \"product_id\": 3,\n                    \"title\": \"Absorbing Clamp - 12\",\n                    \"model\": \"AB - 2018\",\n                    \"qty\": 2500,\n                    \"price\": 250.5,\n                    \"description\": \"this is description\\r\\n\\r\\nMultiline Test\\r\\n\\r\\nTHird Line\",\n                    \"features\": \"Frequency - 100 MHZ\\r\\n\\r\\nHuman Readable\\r\\n\\r\\nBits / Byte - Calculated\",\n                    \"specifications\": \"Optional Specification\",\n                    \"image_1\": \"http://compower.local/uploads/products/45949_product.jpg\",\n                    \"image_2\": \"http://compower.local/uploads/products/37868_product.jpg\",\n                    \"image_3\": \"\",\n                    \"image_4\": \"\",\n                    \"image_5\": \"\",\n                    \"chart_1\": \"http://compower.local/uploads/charts/85053_chart.jpg\",\n                    \"chart_2\": \"\",\n                    \"chart_3\": \"\",\n                    \"pdf_title_1\": \"Title - 1\",\n                    \"pdf_1\": \"http://compower.local/uploads/pdf/37947_pdf.jpg\",\n                    \"pdf_title_2\": \"\",\n                    \"pdf_2\": \"\",\n                    \"pdf_title_3\": \"\",\n                    \"pdf_3\": \"\"\n                }\n            ]\n        }\n    ],\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
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
          "content": "    {\n    \"data\": [\n        {\n            \"category_id\": 1,\n            \"category_title\": \"Antenna - Updated\",\n            \"products\": [\n                {\n                    \"product_id\": 1,\n                    \"title\": \"Test Proudct\",\n                    \"model\": \"Modal - 001\",\n                    \"qty\": 250,\n                    \"price\": 1000,\n                    \"description\": \"This is Lorem Ipusm test things.\",\n                    \"features\": \"Special Features\",\n                    \"specifications\": \"Specal Specification\",\n                    \"image_1\": \"http://compower.local/uploads/products/31797_product.jpg\",\n                    \"image_2\": \"http://compower.local/uploads/products/85576_product.jpg\",\n                    \"image_3\": \"http://compower.local/uploads/products/68294_product.jpg\",\n                    \"image_4\": \"\",\n                    \"image_5\": \"\",\n                    \"chart_1\": \"http://compower.local/uploads/charts/85709_chart.jpg\",\n                    \"chart_2\": \"http://compower.local/uploads/charts/70282_chart.jpg\",\n                    \"chart_3\": \"\",\n                    \"pdf_title_1\": \"PDF 1\",\n                    \"pdf_1\": \"http://compower.local/uploads/pdf/13709_pdf.jpg\",\n                    \"pdf_title_2\": \"PDF TItle 2\",\n                    \"pdf_2\": \"http://compower.local/uploads/pdf/41750_pdf.jpg\",\n                    \"pdf_title_3\": \"\",\n                    \"pdf_3\": \"\"\n                },\n                {\n                    \"product_id\": 2,\n                    \"title\": \"Product 2\",\n                    \"model\": \"Modla - 2\",\n                    \"qty\": 1000,\n                    \"price\": 47924,\n                    \"description\": \"Thi sis Prduc\",\n                    \"features\": \"This is features\",\n                    \"specifications\": \"Specifications\",\n                    \"image_1\": \"http://compower.local/uploads/products/51936_product.jpg\",\n                    \"image_2\": \"\",\n                    \"image_3\": \"\",\n                    \"image_4\": \"\",\n                    \"image_5\": \"\",\n                    \"chart_1\": \"http://compower.local/uploads/charts/59865_chart.jpg\",\n                    \"chart_2\": \"\",\n                    \"chart_3\": \"\",\n                    \"pdf_title_1\": \"View Best Performance\",\n                    \"pdf_1\": \"http://compower.local/uploads/pdf/92445_pdf.jpg\",\n                    \"pdf_title_2\": \"View Best Performance - 2\",\n                    \"pdf_2\": \"http://compower.local/uploads/pdf/11403_pdf.jpg\",\n                    \"pdf_title_3\": \"\",\n                    \"pdf_3\": \"\"\n                }\n            ]\n        },\n        {\n            \"category_id\": 2,\n            \"category_title\": \"Absorbing Clamps\",\n            \"products\": [\n                {\n                    \"product_id\": 3,\n                    \"title\": \"Absorbing Clamp - 12\",\n                    \"model\": \"AB - 2018\",\n                    \"qty\": 2500,\n                    \"price\": 250.5,\n                    \"description\": \"this is description\\r\\n\\r\\nMultiline Test\\r\\n\\r\\nTHird Line\",\n                    \"features\": \"Frequency - 100 MHZ\\r\\n\\r\\nHuman Readable\\r\\n\\r\\nBits / Byte - Calculated\",\n                    \"specifications\": \"Optional Specification\",\n                    \"image_1\": \"http://compower.local/uploads/products/45949_product.jpg\",\n                    \"image_2\": \"http://compower.local/uploads/products/37868_product.jpg\",\n                    \"image_3\": \"\",\n                    \"image_4\": \"\",\n                    \"image_5\": \"\",\n                    \"chart_1\": \"http://compower.local/uploads/charts/85053_chart.jpg\",\n                    \"chart_2\": \"\",\n                    \"chart_3\": \"\",\n                    \"pdf_title_1\": \"Title - 1\",\n                    \"pdf_1\": \"http://compower.local/uploads/pdf/37947_pdf.jpg\",\n                    \"pdf_title_2\": \"\",\n                    \"pdf_2\": \"\",\n                    \"pdf_title_3\": \"\",\n                    \"pdf_3\": \"\"\n                }\n            ]\n        }\n    ],\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
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
          "content": "{\n    \"data\": {\n        \"category_id\": 2,\n        \"category_title\": \"Absorbing Clamps\",\n        \"products\": [\n            {\n                \"product_id\": 3,\n                \"title\": \"Absorbing Clamp - 12\",\n                \"model\": \"AB - 2018\",\n                \"qty\": 2500,\n                \"price\": 250.5,\n                \"description\": \"this is description\\r\\n\\r\\nMultiline Test\\r\\n\\r\\nTHird Line\",\n                \"features\": \"Frequency - 100 MHZ\\r\\n\\r\\nHuman Readable\\r\\n\\r\\nBits / Byte - Calculated\",\n                \"specifications\": \"Optional Specification\",\n                \"image_1\": \"http://compower.local/uploads/products/45949_product.jpg\",\n                \"image_2\": \"http://compower.local/uploads/products/37868_product.jpg\",\n                \"image_3\": \"\",\n                \"image_4\": \"\",\n                \"image_5\": \"\",\n                \"chart_1\": \"http://compower.local/uploads/charts/85053_chart.jpg\",\n                \"chart_2\": \"\",\n                \"chart_3\": \"\",\n                \"pdf_title_1\": \"Title - 1\",\n                \"pdf_1\": \"http://compower.local/uploads/pdf/37947_pdf.jpg\",\n                \"pdf_title_2\": \"\",\n                \"pdf_2\": \"\",\n                \"pdf_title_3\": \"\",\n                \"pdf_3\": \"\"\n            }\n        ]\n    },\n    \"status\": true,\n    \"message\": \"View Item\",\n    \"code\": 200\n}",
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
          "content": "{\n    \"data\": [\n        {\n            \"product_id\": 3,\n            \"category_id\": 2,\n            \"category_title\": \"Absorbing Clamps\",\n            \"title\": \"Absorbing Clamp - 12\",\n            \"model\": \"AB - 2018\",\n            \"qty\": 2500,\n            \"price\": 250.5,\n            \"description\": \"this is description\\r\\n\\r\\nMultiline Test\\r\\n\\r\\nTHird Line\",\n            \"features\": \"Frequency - 100 MHZ\\r\\n\\r\\nHuman Readable\\r\\n\\r\\nBits / Byte - Calculated\",\n            \"specifications\": \"Optional Specification\",\n            \"image_1\": \"http://compower.local/uploads/products/45949_product.jpg\",\n            \"image_2\": \"http://compower.local/uploads/products/37868_product.jpg\",\n            \"image_3\": \"\",\n            \"image_4\": \"\",\n            \"image_5\": \"\",\n            \"chart_1\": \"http://compower.local/uploads/charts/85053_chart.jpg\",\n            \"chart_2\": \"\",\n            \"chart_3\": \"\",\n            \"pdf_title_1\": \"Title - 1\",\n            \"pdf_1\": \"http://compower.local/uploads/pdf/37947_pdf.jpg\",\n            \"pdf_title_2\": \"\",\n            \"pdf_2\": \"\",\n            \"pdf_title_3\": \"\",\n            \"pdf_3\": \"\"\n        }\n    ],\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
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
          "content": "{\n    \"data\": {\n        \"user_id\": 3,\n        \"user_token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMsImlzcyI6Imh0dHA6XC9cL2NvbXBvd2VyLmxvY2FsXC9hcGlcL2xvZ2luIiwiaWF0IjoxNTI2ODc4MjA4LCJleHAiOjE1NTg0MTQyMDgsIm5iZiI6MTUyNjg3ODIwOCwianRpIjoiU2xXNmpmNnhhaDBrQWtLcyJ9.x0NsZNHZe517mNKKxrfIY9M4IUDp-LVeW-4bWNP1cEU\",\n        \"device_token\": \"12kjerl3kjKDL343\",\n        \"name\": \"KB\",\n        \"email\": \"user@user.com\",\n        \"company_name\": \"Adroit\",\n        \"contact_name\": \"KB Jaha\",\n        \"mobile\": \"2255244\",\n        \"profile_pic\": \"http://compower.local/uploads/user/C:\\\\Users\\\\user\\\\AppData\\\\Local\\\\Temp\\\\php9BF6.tmp\",\n        \"device_type\": \"1\",\n        \"address\": \"C G Road - Updated\",\n        \"city\": \"Abad\",\n        \"state\": \"Gujarat\",\n        \"zip\": \"234893\",\n        \"country\": \"India\",\n        \"notification_count\": 0\n    },\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
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
            "field": "contact_name",
            "description": "<p>Contact Name - Optional</p>"
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
          "content": "{\n    \"data\": {\n        \"user_id\": 3,\n        \"user_token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMsImlzcyI6Imh0dHA6XC9cL2NvbXBvd2VyLmxvY2FsXC9hcGlcL2xvZ2luIiwiaWF0IjoxNTI2ODA1NjY2LCJleHAiOjE1NTgzNDE2NjYsIm5iZiI6MTUyNjgwNTY2NiwianRpIjoiR05idE84ZEpiamFpYThQMCJ9.nNCqSzyyEH0imkSbyNLq9vTB7lFLpN2ZarUAFp_0VKE\",\n        \"device_token\": \"21D8347DTB4509\",\n        \"name\": \"KB\",\n        \"email\": \"user@user.com\",\n        \"company_name\": \"Adroit\",\n        \"contact_name\": \"KB Jaha\",\n        \"mobile\": \"2255244\",\n        \"profile_pic\": \"http://compower.local/uploads/user/70925_user.jpg\",\n        \"device_type\": \"1\",\n        \"address\": \"C G Road - Updated\",\n        \"city\": \"Abad\",\n        \"state\": \"Gujarat\",\n        \"zip\": \"234893\",\n        \"country\": \"India\",\n        \"notification_count\": 0\n    },\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
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
          "content": "{\n     \"data\": {\n         \"user_id\": 3,\n         \"user_token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMsImlzcyI6Imh0dHA6XC9cL2NvbXBvd2VyLmxvY2FsXC9hcGlcL2xvZ2luIiwiaWF0IjoxNTI2ODA1NjY2LCJleHAiOjE1NTgzNDE2NjYsIm5iZiI6MTUyNjgwNTY2NiwianRpIjoiR05idE84ZEpiamFpYThQMCJ9.nNCqSzyyEH0imkSbyNLq9vTB7lFLpN2ZarUAFp_0VKE\",\n         \"device_token\": \"21D8347DTB4509\",\n         \"name\": \"KB\",\n         \"email\": \"user@user.com\",\n         \"company_name\": \"Adroit\",\n         \"contact_name\": \"KB Jaha\",\n         \"mobile\": \"2255244\",\n         \"profile_pic\": \"http://compower.local/uploads/user/70925_user.jpg\",\n         \"device_type\": \"1\",\n         \"address\": \"C G Road - Updated\",\n         \"city\": \"Abad\",\n         \"state\": \"Gujarat\",\n         \"zip\": \"234893\",\n         \"country\": \"India\",\n         \"notification_count\": 0\n     },\n     \"status\": true,\n     \"message\": \"Success\",\n     \"code\": 200\n }",
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
            "field": "contact_name",
            "description": "<p>Contact Name  - Required</p>"
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
          "content": "{\n    \"data\": {\n        \"user_id\": 11,\n        \"user_token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjExLCJpc3MiOiJodHRwOlwvXC9jb21wb3dlci5sb2NhbFwvYXBpXC9yZWdpc3RlciIsImlhdCI6MTUyNjg3ODQ1NywiZXhwIjoxNTU4NDE0NDU3LCJuYmYiOjE1MjY4Nzg0NTcsImp0aSI6InA0cndwU0c1NERsQ0lQejEifQ.i6GLq8R9Ql-zFG0My6RlqTuI_EF9UM-hq56EN5vRcZ8\",\n        \"device_token\": \"21D8347DTB4509\",\n        \"name\": \"KB\",\n        \"email\": \"userk12134@user.com\",\n        \"company_name\": \"Adroit\",\n        \"contact_name\": \"KB Jaha\",\n        \"mobile\": \"2255244\",\n        \"profile_pic\": \"http://compower.local/uploads/user/default.png\",\n        \"device_type\": \"1\",\n        \"address\": \"C G Road\",\n        \"city\": \"ahmedabad\",\n        \"state\": \"Gujarat\",\n        \"zip\": \"234893\",\n        \"country\": \"\",\n        \"notification_count\": 0\n    },\n    \"status\": true,\n    \"message\": \"Success\",\n    \"code\": 200\n}",
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
  }
] });
