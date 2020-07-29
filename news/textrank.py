from pyvi import ViTokenizer, ViPosTagger
import gensim
from collections import OrderedDict
import numpy as np
import sys

class TextRank4Keyword():
    def __init__(self, d=0.85, min_diff=1e-5, steps=10, node_weight=None, window_size=2):
        self.d = d
        self.min_diff = min_diff
        self.steps = steps
        self.node_weight = node_weight
        self.window_size = window_size
        
    def sentence_segment(self, text, sw_file='./stopwords', cadidate_pos=['Nc', 'Np', 'S', 'R', 'A', 'C', 'V', 'I']):
        """Store those words only in cadidate_pos"""
        
        # Get stopword
        with open(sw_file, 'r') as f:
            sw = f.readlines()
        for i in range(len(sw)):
            sw[i] = sw[i].strip()

        # word segment
        text = ViTokenizer.tokenize(text)
        text = text.replace('‘', ' ')
        text = text.replace('’', ' ')
        text = text.split('.')
        sentences = []
        for t in text:
            temp = ViPosTagger.postagging(t)
            sentence = []
            for w,t in zip(temp[0], temp[1]):
                if len(w) > 0 and w not in sw and t in cadidate_pos:
                    sentence.append(w)
            sentences.append(sentence)

        temp = []
        for sentence in sentences:
            if len(sentence) >= self.window_size:
                temp.append(sentence)
        return temp
    
    def get_vocab(self, sentences):
        """Get all tokens"""
        vocab = OrderedDict()
        i = 0
        for sentence in sentences:
            for word in sentence:
                if word not in vocab:
                    vocab[word] = i
                    i += 1
        return vocab
    
    def get_token_pairs(self, window_size, sentences):
        """Build token_pairs from windows in sentences"""
        token_pairs = list()
        for sentence in sentences:
            for i, word in enumerate(sentence):
                for j in range(i+1, i+window_size):
                    if j >= len(sentence):
                        break
                    pair = (word, sentence[j])
                    if pair not in token_pairs:
                        token_pairs.append(pair)
        return token_pairs
    
    def symmetrize(self, a):
        # Ham tao ma tran doi xung voi duong cheo nhu cu
        # np.diag: trich xuat duong cheo hoac tao ra ma tran duong cheo
        # a.diagonal: tra ve duong cheo cua ma tran a
        return a + a.T - np.diag(a.diagonal())
    
    def get_matrix(self, vocab, token_pairs):
        """Get normalized matrix"""
        # Build matrix
        vocab_size = len(vocab)
        g = np.zeros((vocab_size, vocab_size), dtype='float')
        for word1, word2 in token_pairs:
            i, j = vocab[word1], vocab[word2]
            g[i][j] = 1
            
        # Get Symmeric matrix
        g = self.symmetrize(g)
        
        # Normalize matrix by column
        norm = np.sum(g, axis=0)    # tổng In hoặc Out vì vô hướng 
        g_norm = np.divide(g, norm, where=norm!=0) # this is ignore the 0 element in norm
        
        return g_norm
    
    def get_keywords(self, number=10):
        """Print top number keywords"""
        # print(self.node_weight)
        node_weight = OrderedDict(sorted(self.node_weight.items(), key=lambda t: t[1], reverse=True))
        for i, (key, value) in enumerate(node_weight.items()):
            if(len(key.split('_')) == 1): continue
            print(" ".join(key.split('_')))
            if i > number:
                break
                
    def analyze(self, text):
        """Main function to analyze text"""
        
        # Filter sentences
        sentences = self.sentence_segment(text=text) # list of list of words
        
        # Build vocabulary
        vocab = self.get_vocab(sentences)
        
        # Get token_pairs from windows
        token_pairs = self.get_token_pairs(sentences=sentences, window_size=self.window_size)
        
        # Get normalized matrix
        g = self.get_matrix(vocab, token_pairs)
        
        # Initionlization for weight(pagerank value)
        pr = np.array([1] * len(vocab))
        
        # Iteration
        previous_pr = 0
        for epoch in range(self.steps):
            pr = (1-self.d) + self.d * np.dot(g, pr)
            if abs(previous_pr - sum(pr))  < self.min_diff:
                break
            previous_pr = sum(pr)
        
        dict_pr = OrderedDict()
        for i,v in enumerate(vocab):
            dict_pr[v] = pr[i]
        self.node_weight = dict_pr

def main():

    tr = TextRank4Keyword()
    
    content = sys.argv[1]
    tr = TextRank4Keyword()
    tr.analyze(text=content)
    tr.get_keywords(5)

if __name__ == "__main__":
    main()