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
import axios from 'axios';


import Palco from './Palco'


export default class Detalhes extends React.Component {

    constructor(props) {
        super(props)
        var {id} = this.props.navigation.state.params
            //console.error(this.props.navigation.state.params)
        this.state = {

            id,
            relato: {categoria:""},


        };

    }

    static navigationOptions = {
        header: null,
        gesturesEnabled: true
    }


    componentDidMount() {



        this.setState({loading: true});


        axios
            .get('http://192.168.137.1/argos/detalhes/' + this.state.id )
            .then(response=> {

                //console.error(response.data)
                this.setState({
                    relato: response.data[0],
                    loading: false,
                })


            }).catch(error => {

            console.error(error);

            this.setState({
                error: true,
                loading: false

            })

        })


    }

    click(item) {

        var payload = this.state.payload;
        payload.id_subcategoria = item.id

        this.props.navigation.navigate('Mapa',{payload})

    }


    render() {
        return (
            <Palco titulo={this.state.relato.categoria} back={() => this.props.navigation.goBack()}
                   go={() =>alert("Selecione a sub categoria do problema")}>
                <View style={styles.cont}>

                    {
                        this.state.loading
                            ? <View style={styles.loading}>
                            <ActivityIndicator size={200} color="2c5871"/>
                            <Text style={styles.loadingText}>Buscando detalhes</Text>
                        </View>

                            : <View style={styles.card}>

                              <Text style={styles.textLabel}>Data e Hora: </Text>
                              <Text style={styles.textValue}>{this.state.relato.data_hora}</Text>
                              <Text style={styles.textLabel}>Sub-categoria: </Text>
                              <Text style={styles.textValue}>{this.state.relato.subcategoria}</Text>

                            <Image source={{ uri: "http://192.168.137.1/server/uploads/'" + this.state.relato.arquivo }} style={{width: 200, aspectRadio:1}}/>




                              </View>



                    }


                </View>

            </Palco>
        )
            ;
    }

}


const styles = StyleSheet.create({

    cont: {
        flex: 1,
        marginTop: 20,
        alignItems: 'center',
        justifyContent: 'center'

    },
  card: {
        flex: 1,

        alignItems: 'center',
        justifyContent: 'center'

    },

    item: {
        fontFamily: "browau",
        fontWeight: '500',
        fontSize: 20,
        paddingBottom: 3,
        color: '#2c5871',
        borderWidth: 2,
        borderColor: '#2c5871',
        padding: 10,
        margin: 5,
        borderRadius: 10


    },
    loadingText: {

        color: '#2c5871',
        fontSize: 15,
    },
    textLabel: {
        fontWeight: '500',
        color: '#2c5871',
        fontSize: 20,
    },

    textValue: {

        color: '#2c5871',
        fontSize: 20,
    },
    loading: {

        flex: 1,
        alignItems: 'center',
        justifyContent: 'center',
        flexDirection: 'column'

    },
});