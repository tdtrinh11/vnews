// const model = await tf.loadLayersModel('model_js/model.json');

function getIndexOfMax(a, n){
    b = [...a];
    b.sort(function(x,y){return x-y});
    b.reverse();

    // console.log(a);
    // console.log(b);

    result = []
    for(i=0;i<n;i++){
        result.push(a.indexOf(b[i]));
    }
    return result
}

async function predict(vec){
    // const model = await tf.loadLayersModel('model_js/model.json');
    const vector = tf.tensor([vec]);
    const pred = model.predict(vector).dataSync();
    // var labels = ['CTXH','DS','GD','KD','KHCN','PL','SK','TT','VH','XC'];
    var names = ['Chính trị xã hội', 'Đời sống', 'Giáo dục', 'Kinh doanh', 'Khoa học công nghệ', 'Pháp luật', 'Sức khỏe', 'Thể thao', 'Văn hóa', 'Xe cộ'];

    result = getIndexOfMax(pred, 2);
    console.log(result);
    mainCate = names[result[0]];
    subCate = names[result[1]];
    console.log(mainCate);
    console.log(subCate);
    
    document.getElementById("main-category").innerHTML=mainCate;
    document.getElementById("sub-category").innerHTML=subCate;

    document.getElementById("main-category").setAttribute('category', result[0]);
    document.getElementById("sub-category").setAttribute('category', result[1]); 

    return result;
}