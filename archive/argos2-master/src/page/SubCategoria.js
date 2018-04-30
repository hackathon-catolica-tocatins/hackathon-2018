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


export default class SubCategoria extends React.Component {

    constructor(props) {
        super(props)
        var {id, descricao, payload} = this.props.navigation.state.params
            //console.error(this.props.navigation.state.params)
        this.state = {
            subCategoriaList: [],
            id,
            categoria: descricao,
            payload

        };

    }

    static navigationOptions = {
        header: null,
        gesturesEnabled: true
    }


    componentDidMount() {



        this.setState({loading: true});


        axios
            .get('http://192.168.137.1/argos/subCategorias/' + this.state.id )
            .then(response=> {
                this.setState({
                    subCategoriaList: response.data,
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
            <Palco titulo={ this.state.categoria} back={() => this.props.navigation.goBack()}
                   go={() =>alert("Selecione a sub categoria do problema")}>
                <View style={styles.cont}>

                    {
                        this.state.loading
                            ? <View style={styles.loading}>
                            <ActivityIndicator size={200} color="2c5871"/>
                            <Text style={styles.loadingText}>Consultando SubCategorias</Text>
                        </View>

                            : <FlatList
                            data={this.state.subCategoriaList}
                            renderItem={({ item }) => (
                                           <TouchableOpacity onPress={()=> this.click(item)}>
                                                  <Text style={styles.item}>{item.descricao}</Text>
                                           </TouchableOpacity>


                                                )}

                        />

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
    loading: {

        flex: 1,
        alignItems: 'center',
        justifyContent: 'center',
        flexDirection: 'column'

    },
});