import openai, os, requests

openai.api_type = "azure"
# Azure OpenAI on your own data is only supported by the 2023-08-01-preview API version
openai.api_version = "2023-08-01-preview"

# Azure OpenAI setup
openai.api_base = "https://judi.openai.azure.com/" # Add your endpoint here
openai.api_key = os.getenv("56366effe036483aae6c211a1ef7e119") # Add your OpenAI API key here
deployment_id = "judi_FA" # Add your deployment ID here

# Azure AI Search setup
search_endpoint = "https://energygpt.search.windows.net"; # Add your Azure AI Search endpoint here
search_key = os.getenv("oxLPc2bptZfgW9INOH71qdps3atu6EhaNaUtCBi4yZAzSeDih7tG"); # Add your Azure AI Search admin key here
search_index_name = "judi4"; # Add your Azure AI Search index name here

def setup_byod(deployment_id: str) -> None:
    """Sets up the OpenAI Python SDK to use your own data for the chat endpoint.

    :param deployment_id: The deployment ID for the model to use with your own data.

    To remove this configuration, simply set openai.requestssession to None.
    """

    class BringYourOwnDataAdapter(requests.adapters.HTTPAdapter):

        def send(self, request, **kwargs):
            request.url = f"{openai.api_base}/openai/deployments/{deployment_id}/extensions/chat/completions?api-version={openai.api_version}"
            return super().send(request, **kwargs)

    session = requests.Session()

    # Mount a custom adapter which will use the extensions endpoint for any call using the given `deployment_id`
    session.mount(
        prefix=f"{openai.api_base}/openai/deployments/{deployment_id}",
        adapter=BringYourOwnDataAdapter()
    )

    openai.requestssession = session

setup_byod(deployment_id)


message_text = [{"role": "user", "content": "What are the differences between Azure Machine Learning and Azure AI services?"}]

completion = openai.ChatCompletion.create(
    messages=message_text,
    deployment_id=deployment_id,
    dataSources=[  # camelCase is intentional, as this is the format the API expects
      {
  "type": "AzureCognitiveSearch",
  "parameters": {
    "endpoint": "'$search_endpoint'",
    "indexName": "'$search_index'",
    "semanticConfiguration": "default",
    "queryType": "vector",
    "fieldsMapping": {},
    "inScope": True,
    "roleInformation": "Tu t'appelle JUDY. Tu es une assistant de chat qui peut répondre à des questions sur les assurances.s.\nJuDi, abréviation de « Juriste Digital », \nest un assistant juridique révolutionnaire \nalimenté par l'IA qui révolutionne l'accès aux \nressources juridiques en Côte d'Ivoire et \nen Afrique subsaharienne. JuDi sert d'expert \njuridique virtuel, fournissant des conseils \njuridiques, des ressources et une assistance \naccessibles et abordables aux particuliers, aux \nentreprises et aux professionnels du droit. \nParlant couramment les langues locales et \nconnaissant parfaitement la \nréglementation OHADA, JuDi responsabilise \nles utilisateurs en simplifiant les processus \njuridiques, en proposant des évaluations de cas, \nen rédigeant des contrats et en effectuant des \nrecherches juridiques.",
    "filter": None,
    "strictness": 3,
    "topNDocuments": 5,
    "key": "'$search_key'",
    "embeddingDeploymentName": "embeding"
  }
}
    ],
    # enhancements=undefined,
    temperature=0,
    top_p=1,
    max_tokens=800,
    stop=None,
    stream=True

)
print(completion)








# import openai
# import os
# import requests

# # Définition de la classe Message
# # class Message:
# #     def __init__(self, role: str, content: str):
# #         self.role = role
# #         self.content = content

# # Configuration de l'API OpenAI
# openai.api_type = "azure"
# openai.api_version = "2023-08-01-preview"
# openai.api_base = "https://judi.openai.azure.com/"
# openai.api_key = "256be7a3f69b449285f13dffd6b457df"  # Remplacez par votre clé API OpenAI
# deployment_id = "judi_FA"   # Remplacez par votre ID de déploiement OpenAI

# # Configuration Azure AI Search
# search_endpoint = "https://energygpt.search.windows.net"  # Remplacez par votre endpoint Azure AI Search
# search_key = "oxLPc2bptZfgW9INOH71qdps3atu6EhaNaUtCBi4yZAzSeDih7tG"  # Remplacez par votre clé d'administrateur Azure AI Search
# search_index_name = "judi5"  # Remplacez par le nom de votre index Azure AI Search

# # Fonction pour configurer l'API OpenAI avec vos propres données
# def setup_byod(deployment_id: str) -> None:
#     """Sets up the OpenAI Python SDK to use your own data for the chat endpoint.

#     :param deployment_id: The deployment ID for the model to use with your own data.

#     To remove this configuration, simply set openai.requestssession to None.
#     """

#     class BringYourOwnDataAdapter(requests.adapters.HTTPAdapter):

#         def send(self, request, **kwargs):
#             request.url = f"{openai.api_base}/openai/deployments/{deployment_id}/extensions/chat/completions?api-version={openai.api_version}"
#             return super().send(request, **kwargs)

#     session = requests.Session()

#     # Mount a custom adapter which will use the extensions endpoint for any call using the given `deployment_id`
#     session.mount(
#         prefix=f"{openai.api_base}/openai/deployments/{deployment_id}",
#         adapter=BringYourOwnDataAdapter()
#     )

#     openai.requestssession = session

# setup_byod(deployment_id)


# message_text = [{"role": "user", "content": "What are the differences between Azure Machine Learning and Azure AI services?"}]

# completion = openai.ChatCompletion.create(
#     messages=[{"role": "user", "content": "comment tu t'appelle"}],
#     deployment_id=deployment_id,
#     dataSources=[{
#         "type": "AzureCognitiveSearch",
#         "parameters": {
#             "endpoint": search_endpoint,
#             "indexName": search_index_name,
#             "semanticConfiguration": "default",
#             "queryType": "vector",
#             "fieldsMapping": {},
#             "inScope": True,
#             "roleInformation": "You are an AI assistant that helps people find information.",
#             "filter": None,
#             "strictness": 3,
#             "topNDocuments": 5,
#             "key": search_key,
#             "embeddingDeploymentName": "embeding"
#         }
#     }],
#     temperature=0,
#     top_p=1,
#     max_tokens=800,
#     stop=None,
#     stream=True
# )

# completions = list(completion)
# print(completions)
