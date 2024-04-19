from typing import List
from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from app.model import Message
from app.libary import send_chat 
from app.library_auphelia import send_chat

app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=['*'],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)


@app.get('/')
def root():
    return 'Hello'

@app.post('/question/')
def getAnswer(message_list: list[Message]):
    return send_chat(message_list)

@app.post('/auphelia/')
def getAnswer(message_list: list[Message]):
    return send_chat(message_list)

# create an endpoint that creates a pdf file from a text

# @app.post('/pdf/{text}')
# async def getPdf(text: str):
#     path = await generate_pdf(text=text)
#     return path
