import React from 'react';
import {
    StyleSheet,
    Text,
    View,
    Image,
    Dimensions,
    PixelRatio,
    ActivityIndicator,
    TouchableOpacity,
    Platform,
    FlatList,
    Button

} from 'react-native';

import Palco from './Palco'
import Icon from 'react-native-vector-icons/FontAwesome';
import axios from 'axios';

import futch from '../api';



export default class Finalizacao extends React.Component {

    constructor(props) {

        super(props)
        var {payload} = this.props.navigation.state.params


        this.state = {payload, imagensEnviadas: 0 };


    }

    static navigationOptions = {
        header: null,
        gesturesEnabled: true
    }


    componentDidMount() {


    }

    enviar(){

        this.setState({isLoading: true});
        const url = 'http://192.168.137.1/argos/relatar/';



       // console.error(this.state.payload)

        axios
            .post(url, this.state.payload)
            .then(response=> {

                alert("Parabéns, " +  response.data )

                for(var i =0 ; i < this.state.payload.fotos.length;i++){

                    this.enviarImagens(this.state.payload.fotos[i])

                }



            }).catch(error => {

            if (error) {
               console.error(error)
            }
        })

    }


    enviarImagens(){

        const uri = this.state.payload.fotos[this.state.imagensEnviadas]

        source = {uri: uri.uri, isStatic: true};

        const data = new FormData();
        data.append('name',  uri.uri);
        data.append('photo', {
            uri: source.uri,
            type: 'image/jpeg',
            name:  uri.uri
        });


        const url = Platform.OS === 'android' ? 'http://192.168.137.1:3000' : 'http://localhost:3000'; // genymotion's localhost is 10.0.3.2
        futch(url + '/single', {
            method: 'post',
            body: data
        }, (e) => {
            const progress = e.loaded / e.total;
           // console.log(progress);
            this.setState({
                progress: progress
            });
        }).then((res) => console.log(res), (e) => console.log(e))




    }



    render(){

        const myIcon = (<Icon name="trash" size={30} color="#900"/>)

        return (
            <Palco titulo={ 'Finalização'}
                   back={() => this.props.navigation.goBack()} go={() =>alert('Click em Finalizar')}>


                <View style={styles.vv}>
                    <Text style={{fontWeight: '500', fontFamily: "browau", fontSize: 20, textAlign:'center' }}>Deseja enviar o problema relatado agora?</Text>
                    <Button onPress={()=> this.enviar()} title="Finalizar"/>


                </View>






            </Palco>
    );
    }

    }


    const styles = StyleSheet.create({

        qtd: {
        fontSize: 20,
        fontWeight: '500',
        marginBottom: 20

    },
        resizeImage: {
        height: undefined,
        width: '100$',
    },
        resizeItem: {
        aspectRatio:1,
        width: '100%',
        borderRadius: 10,
    },
        container: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
        padding: 10,



    },
        vv: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',


    },
        avatarContainer: {
        borderColor: '#9B9B9B',
        borderWidth: 1 / PixelRatio.get(),
        justifyContent: 'center',
        alignItems: 'center'
    },
        avatar: {
        borderRadius: 75,
        width: 150,
        height: 150
    }
    });