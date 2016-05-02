define({ "api": [
  {
    "type": "post",
    "url": "/createPerson",
    "title": "Creates a new person",
    "version": "0.1.0",
    "name": "createPerson",
    "group": "PersonAdministration",
    "permission": [
      {
        "name": "localhost"
      }
    ],
    "description": "<p>creates a new person</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>The address.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "age",
            "description": "<p>The age.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lastName",
            "description": "<p>Last name of the person.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the person.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Request-Example:",
          "content": "{\"data\": {\"address\": \"address\", \"age\": \"31\", \"lastName\": \"lName\", \"name\": \"name\"}}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\"state\":1,\"key\":\"1re545421\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ValidationError",
            "description": "<p>one or more  fields  have errors</p>"
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "NoAccessRight",
            "description": "<p>only  local requests are accepted</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Response (example):",
          "content": "HTTP/1.1 200 OK\n{\"state\":-1,\"msj\":\"error\"}",
          "type": "json"
        },
        {
          "title": "Response (example):",
          "content": "HTTP/1.1 401 Not Authenticated\n{\"state\":-1,\"msg\":\"This ip (192.168.1.2) doesn't have access.\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./personRoutes.php",
    "groupTitle": "PersonAdministration"
  },
  {
    "type": "delete",
    "url": "/deletePerson/:key/",
    "title": "deletes  a person by key",
    "version": "0.1.0",
    "name": "deletePerson",
    "group": "PersonAdministration",
    "permission": [
      {
        "name": "localhost"
      }
    ],
    "description": "<p>deletes the  information of one person by their key or id</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "key",
            "description": "<p>The key or od of the person</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\"state\":1,\"data\":null}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ValidationError",
            "description": "<p>one or more  fields  have errors</p>"
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "NoAccessRight",
            "description": "<p>only  local requests are accepted</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Response (example):",
          "content": "HTTP/1.1 200 OK\n{\"state\":-1,\"msj\":\"error\"}",
          "type": "json"
        },
        {
          "title": "Response (example):",
          "content": "HTTP/1.1 401 Not Authenticated\n{\"state\":-1,\"msg\":\"This ip (192.168.1.2) doesn't have access.\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./personRoutes.php",
    "groupTitle": "PersonAdministration"
  },
  {
    "type": "get",
    "url": "/person/:key/",
    "title": "returns  a person by key",
    "version": "0.1.0",
    "name": "person",
    "group": "PersonAdministration",
    "permission": [
      {
        "name": "localhost"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "key",
            "description": "<p>The key or od of the person</p>"
          }
        ]
      }
    },
    "description": "<p>Returns the  information of one person by their key or id</p>",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\"state\":1,\"data\":{\"address\": \"address\", \"age\": \"31\", \"lastName\": \"lName\", \"name\": \"name\"}}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ValidationError",
            "description": "<p>one or more  fields  have errors</p>"
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "NoAccessRight",
            "description": "<p>only  local requests are accepted</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Response (example):",
          "content": "HTTP/1.1 200 OK\n{\"state\":-1,\"msj\":\"error\"}",
          "type": "json"
        },
        {
          "title": "Response (example):",
          "content": "HTTP/1.1 401 Not Authenticated\n{\"state\":-1,\"msg\":\"This ip (192.168.1.2) doesn't have access.\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./personRoutes.php",
    "groupTitle": "PersonAdministration"
  },
  {
    "type": "put",
    "url": "/updatePerson/:key/",
    "title": "update the data of a person",
    "version": "0.1.0",
    "name": "updatePerson",
    "group": "PersonAdministration",
    "permission": [
      {
        "name": "localhost"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "key",
            "description": "<p>person's unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>The address.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "age",
            "description": "<p>The age.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lastName",
            "description": "<p>Last name of the person.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the person.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Request-Example:",
          "content": "{\"data\": {\"address\": \"address\", \"age\": \"31\", \"lastName\": \"lName\", \"name\": \"name\"}}",
          "type": "json"
        }
      ]
    },
    "description": "<p>updates the information of  a person  that exists in the store  by the key</p>",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\"state\":1,\"data\":{\"key\":\"6ef3ea03a1aeb917d4e8656aa609013d\"}}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ValidationError",
            "description": "<p>one or more  fields  have errors</p>"
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "NoAccessRight",
            "description": "<p>only  local requests are accepted</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Response (example):",
          "content": "HTTP/1.1 200 OK\n{\"state\":-1,\"msj\":\"error\"}",
          "type": "json"
        },
        {
          "title": "Response (example):",
          "content": "HTTP/1.1 401 Not Authenticated\n{\"state\":-1,\"msg\":\"This ip (192.168.1.2) doesn't have access.\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./personRoutes.php",
    "groupTitle": "PersonAdministration"
  }
] });
