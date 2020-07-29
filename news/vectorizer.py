import pickle
from keras.preprocessing.sequence import sequence
from pyvi import ViTokenizer, ViPosTagger
import gensim
import sys

MAX_SEQUENCE_LENGTH = 300   # so tu toi da cua mot vb

def word_segment(text, sw_file='./stopwords'):
    # Get stopword
    with open(sw_file, 'r') as f:
        sw = f.readlines()
    for i in range(len(sw)):
        sw[i] = sw[i].strip()
    
    # word segment
    text = ViTokenizer.tokenize(text)
    text = gensim.utils.simple_preprocess(text)
    text = [w for w in text if not w in sw]
    text = " ".join(text)
    return text

def vectorizer(text):

    tokenizer = pickle.load(open('./tokenizer.pkl', 'rb'))
    text = [text]
    text = tokenizer.texts_to_sequences(text)
    text = sequence.pad_sequences(text, maxlen=MAX_SEQUENCE_LENGTH)

    return text

def main(text):
    vec = vectorizer(word_segment(text, './stopwords'))
    return vec

if __name__ == "__main__":
    text = sys.argv[1]
    vec = main(text=text)
    print(vec.tolist()[0])
